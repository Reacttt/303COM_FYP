<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Template\Template;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Order Seeder 1

        $shipping_details = DB::table('shipping_details')->where('shipping_details_id', 1)->first();

        DB::table('order')->insert([
            "order_id" => 1,
            "user_id" => 1,
            "order_status" => "Pending Payment",
            "order_first_name" => $shipping_details->shipping_first_name,
            "order_last_name" => $shipping_details->shipping_last_name,
            "order_address_line1" => $shipping_details->shipping_address_line1,
            "order_address_line2" => $shipping_details->shipping_address_line2,
            "order_city" => $shipping_details->shipping_city,
            "order_postal_code" => $shipping_details->shipping_postal_code,
            "order_country" => $shipping_details->shipping_country,
            "order_contact" => $shipping_details->shipping_contact,
            "created_at" => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        for ($i = 0; $i < 2; $i++) {
            $product = DB::table('product')->where('product_id', rand(1, 5))->first();

            DB::table('order_item')->insert([
                "order_id" => 1,
                "product_id" => $product->product_id,
                "order_item_name" => $product->product_name,
                "order_item_description" => $product->product_description,
                "order_item_image" => $product->product_image,
                "order_item_price" => $product->product_price,
                "order_item_quantity" => rand(1, 3),
                "created_at" => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        };

        // Order Seeder 2

        $shipping_details = DB::table('shipping_details')->where('shipping_details_id', 2)->first();

        DB::table('order')->insert([
            "order_id" => 2,
            "user_id" => 1,
            "order_status" => "Pending Shipment",
            "order_first_name" => $shipping_details->shipping_first_name,
            "order_last_name" => $shipping_details->shipping_last_name,
            "order_address_line1" => $shipping_details->shipping_address_line1,
            "order_address_line2" => $shipping_details->shipping_address_line2,
            "order_city" => $shipping_details->shipping_city,
            "order_postal_code" => $shipping_details->shipping_postal_code,
            "order_country" => $shipping_details->shipping_country,
            "order_contact" => $shipping_details->shipping_contact,
            "created_at" => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        for ($i = 0; $i < 2; $i++) {
            $product = DB::table('product')->where('product_id', rand(1, 5))->first();

            DB::table('order_item')->insert([
                "order_id" => 2,
                "product_id" => $product->product_id,
                "order_item_name" => $product->product_name,
                "order_item_description" => $product->product_description,
                "order_item_image" => $product->product_image,
                "order_item_price" => $product->product_price,
                "order_item_quantity" => rand(1, 3),
                "created_at" => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        };

        // Order Seeder 3

        $shipping_details = DB::table('shipping_details')->where('shipping_details_id', 1)->first();

        DB::table('order')->insert([
            "order_id" => 3,
            "user_id" => 1,
            "order_status" => "Completed",
            "order_first_name" => $shipping_details->shipping_first_name,
            "order_last_name" => $shipping_details->shipping_last_name,
            "order_address_line1" => $shipping_details->shipping_address_line1,
            "order_address_line2" => $shipping_details->shipping_address_line2,
            "order_city" => $shipping_details->shipping_city,
            "order_postal_code" => $shipping_details->shipping_postal_code,
            "order_country" => $shipping_details->shipping_country,
            "order_contact" => $shipping_details->shipping_contact,
            "created_at" => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        for ($i = 0; $i < 2; $i++) {
            $product = DB::table('product')->where('product_id', rand(1, 5))->first();

            DB::table('order_item')->insert([
                "order_id" => 3,
                "product_id" => $product->product_id,
                "order_item_name" => $product->product_name,
                "order_item_description" => $product->product_description,
                "order_item_image" => $product->product_image,
                "order_item_price" => $product->product_price,
                "order_item_quantity" => rand(1, 3),
                "created_at" => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        };

        // Order Seeder 4

        $shipping_details = DB::table('shipping_details')->where('shipping_details_id', 2)->first();

        DB::table('order')->insert([
            "order_id" => 4,
            "user_id" => 1,
            "order_status" => "Cancelled",
            "order_first_name" => $shipping_details->shipping_first_name,
            "order_last_name" => $shipping_details->shipping_last_name,
            "order_address_line1" => $shipping_details->shipping_address_line1,
            "order_address_line2" => $shipping_details->shipping_address_line2,
            "order_city" => $shipping_details->shipping_city,
            "order_postal_code" => $shipping_details->shipping_postal_code,
            "order_country" => $shipping_details->shipping_country,
            "order_contact" => $shipping_details->shipping_contact,
            "created_at" => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        for ($i = 0; $i < 2; $i++) {
            $product = DB::table('product')->where('product_id', rand(1, 5))->first();

            DB::table('order_item')->insert([
                "order_id" => 4,
                "product_id" => $product->product_id,
                "order_item_name" => $product->product_name,
                "order_item_description" => $product->product_description,
                "order_item_image" => $product->product_image,
                "order_item_price" => $product->product_price,
                "order_item_quantity" => rand(1, 3),
                "created_at" => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        };
    }
}
