<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{

    public function index(){
    $products = Product::all();
    return response()->json($products);
    }
    public function create(Request $request){
    $product = Product::create($request->all());
    return response()->json($product);
    }
    public function update($id, Request $request){
    $product = Product::find($id);
    $product->update($request->all());
    return response()->json($product);
    }
    public function show($id){
    $product = Product::find($id);
    return response()->json($product);
    }
    public function destroy($id){
    $product = Product::find($id);
    $product->delete();
    return response()->json('product has been removed');
    }
}
