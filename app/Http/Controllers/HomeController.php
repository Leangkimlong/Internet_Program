<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    public function renderHome(){
        $products = Product::take(10)->get();
        $categories = Category::all();
        // $categories = Category::take(3)->get();
        $bgColors = [
            [
                "#F2FCE4",
                "#FFFCEB",
                "#ECFFEC",
                "#FEEFEA",
                "#FFF3EB",
                "#FFF3FF",
                "#F2FCE4",
                "#FFFCEB",
                "#F2FCE4",
                "#FFF3FF"
            ],
            [
                "#3BB77E",
                "#3BB77E",
                "#FDC040",
            ]
        ];
        $promotions = [
            [
                "Everyday Fresh & Clean with Our Products",
                "Make your Breakfast Healthy and Easy",
                "The best Organic Products Online",
            ],
            [
                "Cms-041.png",
                "Cat-011.png",
                "Cms-031.jpg",
            ]
        ];
        return view('home',compact('products','bgColors','promotions','categories'));
    }

    public function add(Request $request){
        $product = null;
        if($request->query('id')){
            $product = Product::findOrFail($request->query('id'));
        }
        $categories = Category::all();
        return view('addproduct',compact('categories','product'));
    }

    public function edit(){
        $products = Product::all();

        return view('products',compact('products'));
    }

    public function store(Request $request){
        $name = Str::random(30);
        $image = $request->file('image');
        $imgName = $name . '.' . $request->file('image')->extension();
        $manager = new ImageManager(['driver' => 'imagick']);
        $exist = null;

        if($request->has('id')){
            $exist = true;

            Product::updateOrInsert(['id'=>$request->input('id')],[
                'name' => $request->input('name'),
                'pricing' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                'description' => $request->input('description'),
                'promotion' => '-' . $request->input('promotion').'%',
            ]);

            $imgName = Product::findOrFail($request->input('id'))->image;
        }

        if($image->getSize() > 206 * 136){

            $image = $manager->make($image)->resize(206, 136, function ($constraint) {
                $constraint->aspectRatio(); 
                $constraint->upsize(); 
            });
        
            $canvas = $manager->canvas(206, 136, '#ffffff');
            $canvas->insert($image, 'center');
        }

        // Storage::disk('local')->put('public/img/'. $imgName, file_get_contents($request->file('image')));
        Storage::disk('local')->put('public/img/' . $imgName, $canvas->encode());

       if(!$exist){
           $product = new Product([
               'name' => $request->input('name'),
               'pricing' => $request->input('price'),
               'category_id' => $request->input('category_id'),
               'description' => $request->input('description'),
               'image' => $imgName,
               'promotion' => '-' . $request->input('promotion').'%',
               'star' => rand(1,5),
           ]);
   
           $product->save();
       }
        // $product = Product::insert([
        //     'name' => $request->input('name'),
        //     'pricing' => $request->input('price'),
        //     'category_id' => $request->input('category_id'),
        //     'description' => $request->input('description'),
        //     'image' => $name . '.' . $request->file('image')->extension(),
        // ]);


        return redirect('/');
    }

    public function products(){
        $products = Product::all();

        return view('products',compact('products'));
    }
}
