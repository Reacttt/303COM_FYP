<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            $carts[] = [
                'user_id' => rand(1, 3),
                'product_id' => rand(1, 3),
                'product_quantity' => rand(1,3),
            ];
        }

        DB::table('cart')->insert($carts);
    }
}
