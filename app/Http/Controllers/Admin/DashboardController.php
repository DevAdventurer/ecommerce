<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
   
    public function index(Request $request){

        return view('admin.dashboard');
    }

    
    
}
