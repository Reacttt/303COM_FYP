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
            'username' => 'customer',
            'password' => Hash::make('password'),
            'email' => 'customer@estore.com'
        ]);

        for ($i = 0; $i < 3; $i++) {
            $users[] = [
                'username' => Str::random(10),
                'password' => Hash::make('password'),
                'email' => Str::random(10) . '@estore.com'
            ];
        }

        User::insert($users);
    }
}
