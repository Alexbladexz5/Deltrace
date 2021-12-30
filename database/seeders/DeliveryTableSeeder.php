<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Delivery;
use DB;

class DeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->insert([
            [
                'name' => 'Entrega 1',
                'address' => 'Ctra. de Ronda, 325, 04009 Almería',
                'coordinates' => '36.8478632,-2.4527225,18',
                'estimated_time' => '2021-12-21 20:00:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 2',
                'address' => 'Av. del Mediterráneo, 414, 04009 Almería',
                'coordinates' => '36.8537259,-2.4438188,16.39',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ]
        ]);
    }
}
