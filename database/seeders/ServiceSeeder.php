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
        DB::table('service')->insert([
            'title' => 'Manpower',
            'category' => 'service',
            'description' => 'We have a team of well trained manpower that will assist to load and unload your items and send to your destination.'
        ]);

        DB::table('service')->insert([
            'title' => '3 Ton Lorry',
            'category' => 'transport',
            'description' => 'We have 3 Ton Lorry that could help you to load large quantity of items'
        ]);
    }
}
