<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employee')->insert([
            'user_id' => 'E100',
            'name' => 'Kamal',
            'phone' => '0198765432',
            'email' => 'kamal@gmail.com',
        ]);
    }
}
