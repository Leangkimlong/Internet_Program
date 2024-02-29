<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // --- GET /api/products
    public function getProducts() {
        $product = Product::all();

        return view('showpro',['p'=> $product]);
    }

    // --- POST /api/products
    public function createProducts() {
        $fake = Faker::create();

        $product = new Product([
            'name' => $fake -> name,
            'category_id' -> 1,
            'price' => rand(30,50),
            'description' => $fake ->  sentence,
        ]);

        $product -> save();

        return view('showpro',['p'=> Product::all()]);
    }

    // --- GET /api/products/{productID}
    public function getProduct($productId) {
        $pro[] = Product::find($productId);

        return view('showpro',['p' => $pro]);
    }

    // --- PATCH /api/products/{productID}
    public function updateProduct($productId) {
        $pro[] = Product::find($productId);

        $pro[0]->name = $name->name;
        $pro[0]->save();

        return view('showpro',['p'=> Product::all()]);
    }

    // --- DELETE /api/products/{productID}
    public function deleteProduct($productId) {
        $pro = Prodcut::find($productId);

        $pro->delete();
        return view('showpro',['p'=> Product::all()]);
    }

    // --- GET /api/categories/{categoryId}/products
    public function getCategoryProducts($categoryId){
        $pro = Product::where('category_id',$categoryId)->get();

        return view('showpro',[p => $pro])
    }
}
