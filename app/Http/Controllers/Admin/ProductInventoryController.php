<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductInventory\ProductInventoryCollection;
use App\Models\Category;
use App\Models\CategoryProductInventory;
use App\Models\ProductInventory;
use App\Models\Tag;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ProductInventoryController extends Controller
{  
    
    public function index(Request $request, $id)
    {
       if ($request->ajax()) {
           
            $datas = ProductInventory::orderBy('created_at','desc')->whereIn('product_id', [$id])->select(['id','title','slug','status','created_at']);
            $search = $request->search['value'];

            if ($search) {
                $datas->where('name', 'like', '%'.$search.'%');
                $datas->orWhere('slug', 'like', '%'.$search.'%');
              
            }

            if ($request->category) {
                $productInventorys->whereHas('category',function($query)use($request){
                    $query->whereIn('category_id',$this->getChildCategories($request->category));
                });
            }
            
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new ProductInventoryCollection($datas));
        }
        return view('admin.product-inventory.inventory.list');
    }

   
    public function create(Request $request, $id)
    {
        //return $id;
        return view('admin.product-inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',
        ]);

        $productInventory = new ProductInventory;
        $productInventory->title = $request->title;
        $productInventory->body = $request->description;
        $productInventory->short_description = $request->short_description;
        $productInventory->published_at = Carbon::parse($request->published_date)->format('Y-m-d');
        $productInventory->status = $request->status??0;
        $productInventory->brand_id = $request->brand;
        $productInventory->productInventory_type_id = $request->productInventory_type;
        $productInventory->vendor_id = $request->vendor;
        $productInventory->price = $request->price;
        $productInventory->sale_price = $request->sale_price;

        $productInventory->meta_title = $request->meta_title;
        $productInventory->meta_description = $request->meta_description;

        if($request->hasFile('featured_image')){
            $image_name = time().".".$request->file('featured_image')->getClientOriginalExtension();
            $image = $request->file('featured_image')->storeAs('productInventorys', $image_name);
            $productInventory->featured_image = 'storage/'.$image;
        }  

        if($productInventory->save()){ 
            $productInventory->collections()->sync($request->collections);
            $productInventory->tags()->sync($request->tags);
            

            return redirect()->route('admin.product-inventory.index')->with(['class'=>'success','message'=>'Product Inventory Created successfully.']);
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProductInventory $productInventory)
    {
        $productInventory->with(['productInventoryType', 'brand', 'vendor']);
        return view('admin.product-inventory.views', compact('productInventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productInventory = ProductInventory::with('tags','categories')->where('id',$id)->first();
        return view('admin.product-inventory.edit',compact('productInventory'));
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

        $productInventory = ProductInventory::find($id);
        $productInventory->title = $request->title;
        $productInventory->subtitle = $request->subtitle;
        $productInventory->body = $request->body;
        $productInventory->status = $request->status??0;

        if($request->hasFile('image')){

            $image_name = time().".".$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->storeAs('ProductInventorys', $image_name);
            $productInventory->image = 'storage/'.$image;
        }  

        if($productInventory->save()){ 
            $productInventory->categories()->sync($request->categories);
            $productInventory->tags()->sync($request->tags);
            

            return redirect()->route('admin.product-inventory.index')->with(['class'=>'success','message'=>'Product Inventory Created successfully.']);
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
        if(ProductInventory::where('id',$id)->delete()){
            
            return response()->json(['message'=>'Product Inventory Deleted successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
