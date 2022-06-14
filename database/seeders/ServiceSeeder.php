<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('services')->insert([
            'id' => 'S101',
            'title' => 'Manpower',
            'category' => 'service',
            'description' => 'We have a team of well trained manpower that will assist to load and unload your items and send to your destination.'
        ]);

        DB::table('services')->insert([
            'id' => 'S102',
            'title' => 'Dismantle',
            'category' => 'service',
            'description' => 'Experienced manpower  will help to dismantle the furniture using the correct technique and tools.'
        ]);

        DB::table('services')->insert([
            'id' => 'S103',
            'title' => 'Wrapping',
            'category' => 'service',
            'description' => 'Wrapping your items using shrink and bubble wrap to protect from any damage during moving.'
        ]);

        DB::table('services')->insert([
            'id' => 'S104',
            'title' => '1 Ton Lorry',
            'category' => 'transport',
            'description' => 'We have 1 Ton Lorry that could help you to load small quantity of items'
        ]);

        DB::table('services')->insert([
            'id' => 'S105',
            'title' => '3 Ton Lorry',
            'category' => 'transport',
            'description' => 'We have 3 Ton Lorry that could help you to load large quantity of items'
        ]);
    }
}
