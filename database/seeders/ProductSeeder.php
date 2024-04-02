<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $text = Faker::create();
        DB::table('products')->delete();
        DB::statement('alter table products auto_increment = 1');
        DB::table('products')->insert([
            [
                'image' => '18 1.png',
                'name' => "Seeds of Change Organic Quinoa, Brown, & Red Rice",
                'promotion' => "-17%",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
            [
                'image' => '1 902.png',
                'name' => "All Natural Italian-Style Chicken Meatballs",
                'promotion' => "Hot",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
            [
                'image' => '3 389454.png',
                'name' => "Angie’s Boomchickapop Sweet & Salty Kettle Corn",
                'promotion' => "Sale",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
            [
                'image' => '5 7.png',
                'name' => "Foster Farms Takeout Crispy Classic Buffalo Wings",
                'promotion' => "-17%",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
            [
                'image' => '7 1.png',
                'name' => "Blue Diamond Almonds Lightly Salted Vegetables",
                'promotion' => "-17%",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
            [
                'image' => '8 1.png',
                'name' => "Chobani Complete Vanilla Greek Yogurt",
                'promotion' => "-17%",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
            [
                'image' => '9 1.png',
                'name' => "Canada Dry Ginger Ale – 2 L Bottle - 200ml - 400g",
                'promotion' => "Sale",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
            [
                'image' => '11 1.png',
                'name' => "Encore Seafoods Stuffed Alaskan Salmon",
                'promotion' => "-17%",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
            [
                'image' => '12 1.png',
                'name' => "Gorton’s Beer Battered Fish Fillets with soft paper",
                'promotion' => "-17%",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
            [
                'image' => '16 1.png',
                'name' => "Haagen-Dazs Caramel Cone Ice Cream Ketchup",
                'promotion' => "Hot",
                'pricing' => rand(1, 100) + (rand(0, 99) / 100),
                'description' => $text->text(),
                'category_id' => rand(1, 10),
                'star' => rand(10,40)/10
            ],
        ]);
        // DB::table('products')->insert([
        //     'name' => Str::random(10),
        //     'category_id' => 1,
        //     'pricing' => rand(3000, 10000)/100,
        //     'description' => Str::random(10),
        // ]);
    }
}
