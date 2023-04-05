<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FrontendController extends Controller{ 

    public function home(Request $request)
    {
    	return view('web.home');
    }
}