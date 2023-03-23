<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Admin\AdminCollection;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            //dd($request->all());
            $datas = Admin::orderBy('admins.created_at','desc')->whereNotIn('admins.id',[1])->join('roles','roles.id','admins.role_id')->select(['admins.id as id','roles.name as role','admins.name as name','email','admins.status']);

            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();

            return response()->json(new AdminCollection($datas));
           
        }
        return view('admin.admin.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product )
    {   
        
    }
 
        public function store(Request $request) {

            $this->validate($request,[
                'name'=>'required|string|max:255',
                'password'=>'required|string|min:6',
                'role'=>'required',
                'email'=>'required|email|max:255|unique:admins',    
            ]);

            
            return redirect()->route('admin.admin.index')->with(['class'=>'success','message'=>'Admin Created successfully.']);
            

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }


        public function edit(Request $request, $id ){   
            $admin = Admin::find($id);
            return view('admin.admin.edit',compact('admin'));
        }






    public function update(Request $request, $id) {

            $this->validate($request,[
                'name'=>'required',
                'role'=>'required',    
            ]);

            $admin = Admin::find($id);
          
            $admin->role_id = $request->role;
            $admin->name = $request->name;
            $admin->mobile = $request->contact_number;
            $admin->gender = $request->gender;
            $admin->status = $request->status??0;
            $admin->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
            if($request->password != '' || $request->password != null || $request->password != NULL || $request->password != Null){
                $admin->password = bcrypt($request->password);
            }

            if($request->hasFile('avatar')){
                $image_name = time().".".$request->file('avatar')->getClientOriginalExtension();
                $image = $request->file('avatar')->storeAs('admin', $image_name);
                $admin->avatar = 'storage/'.$image;
            }

            if($admin->save()){ 
                return redirect()->route('admin.admin.index', )->with(['class'=>'success','message'=>'Admin updated successfully.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }







        

    
    public function destroy(Request $request, Admin $admin)
    {
       
        if($admin->delete()){
            
            return response()->json(['message'=>'Admin deleted successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }




    






}
