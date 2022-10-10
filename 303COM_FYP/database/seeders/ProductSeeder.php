<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_id_list = DB::table('category')->pluck('category_id');
        for ($i = 0; $i < 10; $i++) {
            $products[] = [
                'category_id' => rand(1,5),
                'product_name' => 'Product #' . $i+1,
                'product_description' => 'Product Description for ' . $i+1,
                'product_image' => 'product-' . $i+1 . '.jpg',
                'product_stock' => rand(5,50),
                'product_price' => rand(5,50) . '.99',
                'product_sale' => 0,
                'product_status' => 1,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];
        }

        DB::table('product')->insert($products);
    }
}
