<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'user_id' => 'A100',
            'name' => 'Ali',
            'role' => 'admin',
            'phone' => '0198765432',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('admin123'), // password
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'user_id' => 'C100',
            'name' => 'Abu',
            'role' => 'customer',
            'phone' => '0123456789',
            'email' => 'abu@gmail.com',
            'password' => Hash::make('customer123'), // password
            'remember_token' => Str::random(10)
        ]);
    }
}
