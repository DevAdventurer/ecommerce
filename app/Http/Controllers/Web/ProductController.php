<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductVariant;



class ProductController extends Controller{ 

	public function single(Request $request, Product $product){
		

        $product->with(['tags','collections', 'brand', 'productType','vendor','productVariants'])
        ->with('options', function($query){
            $query->with('optionValues');
        })
        ->first(); 

		return view('web.product', compact('product'));
    }

    public function singleVariant(Request $request, $product)
    {
    	$variant = ProductVariant::where(['product_id'=>$product, 'variant'=>$request->variant])->first();
    	return response(['datas'=>$variant,'status'=>200, 'msg'=>'data found', 'error'=>false]);
    }
}