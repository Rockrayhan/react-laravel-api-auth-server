<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        // $user_id = Auth::user() ;
        // dd($user_id);
        $products = Product::all();
        return response()->json($products);
        // return view('index' , compact('products')) ;
    }



    public function store( Request $request ){
        $validate = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:1000',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'user_id' => 'required|integer',
        ]) ;

         Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'user_id' => $request->user_id
        ]);

        return response(['message' => 'Product Inserted Successfully'], 201) ;
        
    }




    public function edit($id){
        // $product = Product::find($id);
        $product = Product::findOrFail($id);
        return response()->json($product);
    }






    public function update( Request $request, $id ){
        $validate = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:1000',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'user_id' => 'required|integer',
        ]) ;

        $product = Product::findOrFail($id);

        $product->update($validate);


        return response(['message' => 'Product Updated Successfully'], 201) ;
        
    }


    public function delete($id){
        Product::findOrFail($id)->delete();
        return response(['message' => 'Product Deleted Successfully'], 201) ;

    }



}
