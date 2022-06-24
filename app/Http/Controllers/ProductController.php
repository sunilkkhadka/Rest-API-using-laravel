<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();
        return response()->json([
            'products' => $products
        ]);
    }

    public function show($id){
        $product = Product::find($id);

        if($product){
            return response()->json([
                'product' => $product
            ]);
        }
        else {
            return response()->json([
                'message' => 'product not found'
            ]);
        }
    }

    public function store(Request $request){

    // validation
        $validated = $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'quantity' => 'required|max:191',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        return response()->json([
            'status' => 200,
            'message' => 'Product added successfully'
        ]);
    }
}
