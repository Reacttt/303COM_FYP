<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'category_name' => 'Fashion & Beauty',
            'category_description' => 'All about fashion and beauty products',
            'category_image' => 'brand-1.png'
        ]);

        DB::table('category')->insert([
            'category_name' => 'Kids & Babies',
            'category_description' => 'All about kids and babies products',
            'category_image' => 'brand-2.png'
        ]);

        DB::table('category')->insert([
            'category_name' => 'Men & Women Clothes',
            'category_description' => 'All about men and women products',
            'category_image' => 'brand-3.png'
        ]);

        DB::table('category')->insert([
            'category_name' => 'Gadgets & Accessories',
            'category_description' => 'All about gadgets and accessories products',
            'category_image' => 'brand-4.png'
        ]);

        DB::table('category')->insert([
            'category_name' => 'Electronic & Accessories',
            'category_description' => 'All about electronic and accessories products',
            'category_image' => 'brand-5.png'
        ]);
    }
}
