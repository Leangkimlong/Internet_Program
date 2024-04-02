<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();
        DB::statement('alter table categories auto_increment = 1');
        DB::table('categories')->insert([
            [
                'image' => "cat-13 1.png",
                'count' => "14 items",
                'name' => "Cake & Milk",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => "cat-11 1.png",
                'count' => "17 items",
                'name' => "Peach",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => "cat-12 1.png",
                'count' => "21 items",
                'name' => "Organic Kiwi",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => "cat-9 1.png",
                'count' => "68 items",
                'name' => "Red Apple",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => "cat-3 1.png",
                'count' => "34 items",
                'name' => "Snack",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => "cat-4 1.png",
                'count' => "25 items",
                'name' => "Black Plum",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => "cat-1 4.png",
                'count' => "65 items",
                'name' => "Vegetables",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => "cat-15 1.png",
                'count' => "33 items",
                'name' => "Headphone",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => "cat-14 1.png",
                'count' => "54 items",
                'name' => "Cake & Milk",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => "cat-7 1.png",
                'count' => "63 items",
                'name' => "Orange",
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
