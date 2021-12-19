<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;
use DB;

class RouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
            [
                'date_time' => now(),
                'user_id' => '2'
            ],
            [
                'date_time' => now(),
                'user_id' => '3'
            ],
            [
                'date_time' => now(),
                'user_id' => '4'
            ]
        ]);
    }
}
