<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Product\ProductCollection;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ProductController extends Controller
{ 
    
    
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
           

            $datas = Product::orderBy('created_at','desc')->select(['id','title','slug','status','created_at']);
            $search = $request->search['value'];

            if ($search) {
                $datas->where('name', 'like', '%'.$search.'%');
                $datas->orWhere('slug', 'like', '%'.$search.'%');
              
            }

            if ($request->category) {
                $products->whereHas('category',function($query)use($request){
                    $query->whereIn('category_id',$this->getChildCategories($request->category));
                });
            }
            
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new ProductCollection($datas));
        }
        return view('admin.product.list');
    }

   
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        
        $this->validate($request,[
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',
        ]);

        $product = new Product;
        $product->title = $request->title;
        $product->body = $request->description;
        $product->short_description = $request->short_description;
        $product->published_at = Carbon::parse($request->published_date)->format('Y-m-d');
        $product->status = $request->status??0;
        $product->brand_id = $request->brand;
        $product->product_type_id = $request->product_type;
        $product->vendor_id = $request->vendor;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;

        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;

        if($request->hasFile('featured_image')){
            $image_name = time().".".$request->file('featured_image')->getClientOriginalExtension();
            $image = $request->file('featured_image')->storeAs('products', $image_name);
            $product->featured_image = 'storage/'.$image;
        }  

        


        if($product->save()){ 
            $product->collections()->sync($request->collections);
            $product->tags()->sync($request->tags);

            $inputs = $request->input('group-a');
            foreach ($inputs as $input) {
                $option  = new Option;
                $option->product_id = $product->id;
                $option->name = $input['option'];
                if($option->save()){
                    $option_vals = explode(',', $input['option_value']);
                    foreach ($option_vals as $option_val) {
                        $option_value  = new OptionValue;
                        $option_value->product_id = $product->id;
                        $option_value->option_id = $option->id;
                        $option_value->option_value = $option_val;
                        $option_value->save();
                    }
                }
                
            }

            $variants = $request->input('variants');
            foreach ($variants as $variant) {

                $product_variant = new ProductVariant;
                $product_variant->product_id = $product->id;
                $product_variant->variant = $variant['value'];
                $product_variant->sku = $variant['sku'];
                $product_variant->variant_price = $variant['variant_price'];
                $product_variant->variant_sale_price = $variant['variant_sale_price'];
                $product_variant->stock = $variant['quantity_on_hand'];
                $product_variant->available_stock = $variant['quantity_available'];
                $product_variant->save();

            }
            

            return redirect()->route('admin.product.index')->with(['class'=>'success','message'=>'Product Created successfully.']);
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        //return view('admin.product.inventory.list');
        $product->with(['productType', 'brand', 'vendor'])->first();
        return view('admin.product.views', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('tags','categories')->where('id',$id)->first();
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            //'subtitle' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',
        ]);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->subtitle = $request->subtitle;
        $product->body = $request->body;
        $product->status = $request->status??0;

        if($request->hasFile('image')){

            $image_name = time().".".$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->storeAs('Products', $image_name);
            $product->image = 'storage/'.$image;
        }  

        if($product->save()){ 
            $product->categories()->sync($request->categories);
            $product->tags()->sync($request->tags);
            

            return redirect()->route('admin.product.index')->with(['class'=>'success','message'=>'Product Created successfully.']);
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::where('id',$id)->delete()){
            
            return response()->json(['message'=>'Product Deleted successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }

    public function generateVariant(Request $request)
    {
        $inputs = $request->input('group-a');

        $options = [];
        
        foreach ($inputs as $input) {
            $option_val = explode(',', $input['option_value']);
            $option_value = array(
                'option_name' => $input['option'],
                'option_value'=>$option_val,
            );
            array_push($options, $option_val);
        }

        $start = array_shift($options);
        $matrix = collect($start)->crossJoin(...$options);
        return view('admin.product.ajax-variant-calculate', compact('matrix'));
    }
}
