<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class CategoryController extends Controller
{
    // --- GET /api/categories
    public function getCategories() {
        $categories = Category::all();
    
        // return all list in category
        return view('showcat',['c'=> $categories]);
    }

    // --- POST /api/categories
    public function createCategories() {
        $name = Faker::create();

        // create funtion to create data
        $category = new Category([
            'name' => $name->name
        ]);
        $category->save();

        return view('showcat',['c'=> Category::all()]);
    }

    // --- GET /api/categories/{categoryId}
    public function getCategory($categoryId) {
        $categories[] = Category::find($categoryId);

        return view('showcat',['c'=> $categories]);
    }

    // --- PATCH /api/categories/{categoryId}
    public function updateCategory($categoryId) {
        $categories[] = Category::find($categoryId);

        $category[0]->name = 'ChangeName';
        $category[0]->save();

        return view('showcar',['c'=> $category]);
    }

    // --- DELETE /api/categories/{categoryID} 
    public function deleteCategory($categoryId) {
        $category = Category::find($categoryId);

        $category->delete();
        return view('showcat',['c'=> $Category::all()]);
    }
}
