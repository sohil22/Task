<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = Category::all();
        return response()->json($categories);

    }

    public function create(Request $request)
    {
        $categories = Category::create($request->all());
        return response()->json($categories);
    }

    public function show($id)
    {

        $jsonString = file_get_contents('http://localhost:8001/api/v1/products');

        $data = json_decode($jsonString, true);

        foreach ($data as $product){
            if($product['cat_id'] == $id){
                $products[] = $product;
            }
        }

        return response()->json($products);

    }

    public function update($id, Request $request){
        $categories = Category::find($id);
        $categories->update($request->all());
          return response()->json($categories);
    }

      public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return response()->json('categories has been removed');
    }
}
