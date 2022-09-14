<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_details')->insert([
            "user_id" => 1,
            "shipping_first_name" => 'Customer',
            "shipping_last_name" => 'One',
            "shipping_address_line1" => 'A-6-9 Luxury Apartment',
            "shipping_address_line2" => '',
            "shipping_city" => 'Ching City',
            "shipping_postal_code" => '1069',
            "shipping_country" => 'Malaysia',
            "shipping_contact" => '012-3456789',
            "shipping_details_status" => 1,
            "created_at" => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('shipping_details')->insert([
            "user_id" => 1,
            "shipping_first_name" => 'John',
            "shipping_last_name" => 'Doe',
            "shipping_address_line1" => '4A Resident Park',
            "shipping_address_line2" => '',
            "shipping_city" => 'Chong City',
            "shipping_postal_code" => '1162',
            "shipping_country" => 'Malaysia',
            "shipping_contact" => '012-9876543',
            "shipping_details_status" => 1,
            "created_at" => \Carbon\Carbon::now()->toDateTimeString()
        ]);

    }
}
