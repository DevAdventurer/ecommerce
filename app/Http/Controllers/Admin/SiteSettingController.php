<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Project\ProjectCollection;
use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logo = SiteSetting::with(['siteLogo', 'siteFavicon'])->latest()->first();
        return view('admin.site-setting.index',compact('logo'));
    }

    public function logo(Request $request)
    {
        //dd($request->all());
        $logo = SiteSetting::latest()->first();
        $logo->title = $request->title;
        $logo->description = $request->description;
        $logo->email = $request->email;
        $logo->contact_no = $request->contact_no;
        $logo->country = $request->country;
        $logo->state = $request->state;
        $logo->city = $request->city;
        $logo->address = $request->address;


        if($request->has('logo')){
            foreach($request->logo as $file){
                $logo->logo = $file;
            } 
        }
        else{
            $logo->logo = Null;
        }  

        if($request->has('favicon')){
            foreach($request->favicon as $file){
                $logo->favicon = $file;
            } 
        }
        else{
            $logo->favicon = Null;
        }


       if($logo->save()){ 
            return redirect()->route('admin.site-setting.index')->with(['class'=>'success','message'=>'Site Information Save Successfully.']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        $roles = Role::select(['id','name'])->get()->pluck('name','id')->toArray();
        return view('admin.project.create',compact('roles'));
    }


}
