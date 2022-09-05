<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'user_username' => 'customer',
            'user_password' => Hash::make('password'),
            'user_email' => 'customer@estore.com',
            'user_status' => '1'
        ]);

        for ($i = 0; $i < 3; $i++) {
            $users[] = [
                'user_username' => Str::random(10),
                'user_password' => Hash::make('password'),
                'user_email' => Str::random(10) . '@estore.com',
                'user_status' => '1'
            ];
        }

        User::insert($users);
    }
}
