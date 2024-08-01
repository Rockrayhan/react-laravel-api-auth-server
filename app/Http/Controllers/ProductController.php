<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
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




}
