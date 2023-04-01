<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Attribute\AttributeCollection;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $datas = Attribute::orderBy('created_at','desc')->select(['id','name','created_at']);
            
            $search = $request->search['value'];
            if ($search) {
                $datas->orWhere('name', 'like', '%'.$search.'%');

            }
            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();
            return response()->json(new AttributeCollection($datas));

        }

        return view('admin.attribute.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        return view('admin.attribute.list');
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

        $attribute = new Attribute;
        $attribute->name = $request->name;

        if($attribute->save()){ 
            return redirect()->route('admin.attribute.index')->with(['class'=>'success','message'=>'Attribute Created successfully.']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Attribute $attribute)
    {
        return view('admin.attribute.edit',compact('Attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $this->validate($request,[
            'name'=>'required',    
        ]);

        $attribute->name = $request->name;

        if($request->checkfile == ''){
            $attribute->image = '';
        }

        if($request->hasFile('image')){
            $image_name = time().".".$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->storeAs('Attributes', $image_name);
            $attribute->image = 'storage/'.$image;
        } 

        if($attribute->save()){ 
            return redirect()->route('admin.attribute.index')->with(['class'=>'success','message'=>'Attribute Updated successfully.']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Attribute $attribute)
    {
        if($attribute->delete()){
            return response()->json(['message'=>'Attribute deleted Successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
