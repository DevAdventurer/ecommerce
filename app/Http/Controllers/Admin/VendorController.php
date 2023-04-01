<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Vendor\VendorCollection;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $datas = Vendor::orderBy('created_at','desc')->select(['id','name','slug','created_at']);
            
            $search = $request->search['value'];
            if ($search) {
                $datas->where('slug', 'like', '%'.$search.'%');
                $datas->orWhere('name', 'like', '%'.$search.'%');
              
            }
            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();
            return response()->json(new VendorCollection($datas));
           
        }

        return view('admin.vendor.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        return view('admin.vendor.list');
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

            $vendor = new Vendor;
            $vendor->name = $request->name;
            if($vendor->save()){ 
                return response()->json(['class'=>'success','message'=>'Vendor Created Successfuly.']);
            }
            return response()->json(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Vendor $vendor)
    {
        return response()->json(['class'=>'success','message'=>'Record Founded','data'=>$vendor]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $this->validate($request,[
                'name'=>'required',    
            ]);

            $vendor->name = $request->name;
            if($vendor->save()){ 
                return response()->json(['class'=>'success','message'=>'Vendor Updated Successfuly.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vendor $vendor)
    {
        if($vendor->delete()){
            return response()->json(['message'=>'Vendor deleted Successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
