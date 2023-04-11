<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\TrustedSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TrustedSection\TrustedSectionCollection;

class TrustedSectionController extends Controller
{

    
    public function index(Request $request)
    {      
        if ($request->ajax()) {
            $datas = TrustedSection::orderBy('created_at','desc')->select(['id','title','subtitle','icon','icon_type','created_at'])->with('media');
            $search = $request->search['value'];

            if ($search) {
                $datas->where('name', 'like', '%'.$search.'%');
                $datas->orWhere('subtitle', 'like', '%'.$search.'%');
              
            }
            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();
            return response()->json(new TrustedSectionCollection($datas));
           
        }

        return view('admin.trusted-section.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trusted-section.create');
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
            'title'=>'required',
        ]);
        
        $trusted_section = new TrustedSection;
        $trusted_section->title = $request->title;
        $trusted_section->body = $request->description;
        $trusted_section->parent = $request->parent;
        $trusted_section->status = $request->status?1:0;
        $trusted_section->published_at = Carbon::parse($request->published_date)->format('Y-m-d');
       
        $trusted_section->meta_title = $request->meta_title??$request->title;
        $trusted_section->meta_description = $request->meta_description??$request->description;

        if($request->has('file')){
            foreach($request->file as $file){
                $trusted_section->media_id = $file;
            } 
        }
           

        if($trusted_section->save()){ 
            return redirect()->route('admin.trusted-section.index')->with(['class'=>'success','message'=>'Trusted 
                Section Created successfully.']);
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TrustedSection $trusted_section)
    {
        return view('admin.trusted-section.create',compact('TrustedSection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TrustedSection $trusted_section)
    {
        $trusted_sections = TrustedSection::select('id', 'title')->pluck('title', 'id');
        return view('admin.trusted-section.edit',compact('TrustedSection','TrustedSections'));
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
        //return $request->all();
        $this->validate($request,[
            'title'=>'required',
            'description' =>'nullable',
            'status'=>'required|integer',
            'published_date'=>'required',
        ]);
        
        $trusted_section = TrustedSection::find($id);
        $trusted_section->title = $request->title;
        $trusted_section->body = $request->description;
        $trusted_section->parent = $request->parent;
        $trusted_section->status = $request->status?1:0;
        $trusted_section->published_at = Carbon::parse($request->published_date)->format('Y-m-d');
       
        $trusted_section->meta_title = $request->meta_title??$request->title;
        $trusted_section->meta_description = $request->meta_description??$request->description;


        if($request->has('file')){
            foreach($request->file as $file){
                $trusted_section->media_id = $file;
            } 
        }else{
             $trusted_section->media_id = Null;
        } 

        if($trusted_section->save()){ 
            return redirect()->route('admin.trusted-section.index')->with(['class'=>'success','message'=>'Trusted 
                Section Updated successfully.']);
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
    {
        //return "ok";
        $catId = $id; 
        if(TrustedSection::where('id',$id)->delete()){
            $cat1 = TrustedSection::select('id')->where('parent',$catId);
            if ($cat1->count()) {
               $cat2 = TrustedSection::select('id')->whereIn('parent',$cat1->get())->delete();
            }
            $cat1->delete();
            //  $logMessage= array(
            //     'user_id'=>auth('admin')->user()->id,
            //     'table'=>'TrustedSection',
            //     'table_id'=>$id
            // );
            
            return redirect()->route('admin.'.request()->segment(2).'.index')->with(['message'=>'Trusted 
                Section deleted successfully ...', 'class'=>'success']);  
        }
        return redirect()->back()->with(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
