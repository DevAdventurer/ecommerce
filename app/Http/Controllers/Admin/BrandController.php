<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Brand\BrandCollection;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $datas = Brand::orderBy('created_at','desc')->select(['id','name','slug','media_id','created_at']);
            
            $search = $request->search['value'];
            if ($search) {
                $datas->where('slug', 'like', '%'.$search.'%');
                $datas->orWhere('name', 'like', '%'.$search.'%');

            }
            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();
            return response()->json(new BrandCollection($datas));

        }

        return view('admin.brand.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        return view('admin.brand.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Employee $employee )
    {   

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request,[
            'name'=>'required',    
        ]);

        $brand = new Brand;
        $brand->name = $request->name;

        if($request->has('brand_image')){
            foreach($request->brand_image as $file){
                $brand->media_id = $file;
            } 
        } 

        if($brand->save()){ 
            return redirect()->route('admin.brand.index')->with(['class'=>'success','message'=>'Brand Created successfully.']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request,[
            'name'=>'required',    
        ]);

        $brand->name = $request->name;

    

        if($request->has('brand_image')){
            foreach($request->brand_image as $file){
                $brand->media_id = $file;
            } 
        }else{
             $brand->media_id = Null;
        } 

        if($brand->save()){ 
            return redirect()->route('admin.brand.index')->with(['class'=>'success','message'=>'Brand Updated successfully.']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Brand $brand)
    {
        if($brand->delete()){
            return response()->json(['message'=>'Brand deleted Successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
