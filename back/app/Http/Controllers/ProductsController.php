<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Auth;
class ProductsController extends Controller
{
    public function index(){
        return Product::orderBy('id','desc')->get();
    }

    public function store(Request $request){
        $product = Product::create($request->all() + ['user_id'=>Auth::id()]);

        return $request->all();
    }

    public function show($id){
        return response()->json(Product::find($id));
    }

    public function update(Request $request,$id){
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id){
        $product_delete = Product::destroy($id);
        if($product_delete){
            return response([],204);
        }else{
            return response(['Problem deleteing the product',500]);
        }
    }
}
