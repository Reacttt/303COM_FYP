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
            'name' => 'Fashion & Beauty',
            'description' => 'All about fashion and beauty products',
            'image' => 'brand-1.png'
        ]);

        DB::table('category')->insert([
            'name' => 'Kids & Babies',
            'description' => 'All about kids and babies products',
            'image' => 'brand-2.png'
        ]);

        DB::table('category')->insert([
            'name' => 'Men & Women Clothes',
            'description' => 'All about men and women products',
            'image' => 'brand-3.png'
        ]);

        DB::table('category')->insert([
            'name' => 'Gadgets & Accessories',
            'description' => 'All about gadgets and accessories products',
            'image' => 'brand-4.png'
        ]);

        DB::table('category')->insert([
            'name' => 'Electronic & Accessories',
            'description' => 'All about electronic and accessories products',
            'image' => 'brand-5.png'
        ]);
    }
}
