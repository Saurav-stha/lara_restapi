<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();

        if ($products->count() > 0){
            return ProductResource::collection($products);
        }
        else{
            return response()->json(['msg' => 'No products available'], 200);
        }
    }
    public function store( Request $request){
        $request->validate([
            'name'=> 'required|string|max:255',
        ]);
    }

    public function show(){

    }
    public function update(){

    }
    public function destroy(){

    }


}
