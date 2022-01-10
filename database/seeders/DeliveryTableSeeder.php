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
                'name' => 'Entrega 01',
                'address' => 'Ctra. de Ronda, 325, 04009 Almería',
                'coordinates' => '36.8478632,-2.4527225,18',
                'estimated_time' => '2021-12-21 20:00:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 02',
                'address' => 'Av. del Mediterráneo, 414, 04009 Almería',
                'coordinates' => '36.8537259,-2.4438188,16.39',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 03',
                'address' => 'C. Faura, 93, 04760 Berja, Almería',
                'coordinates' => '36.842332714217264,-2.947708699605615',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 04',
                'address' => 'Calle Mayor, 144, 04630 Garrucha, Almería',
                'coordinates' => '37.119069268208555,-1.834703652029471',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 05',
                'address' => 'P.º del Mediterráneo, 19D, 04638 Mojácar, Almería',
                'coordinates' => '37.180129600890609,-1.822453668867373',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 06',
                'address' => 'C. Silos, 14, 04638 Mojácar, Almería',
                'coordinates' => '37.139239, -1.853130',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 07',
                'address' => 'C. Pedro Jover, 49, 04002 Almería',
                'coordinates' => '36.838277, -2.471849',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 08',
                'address' => 'C. Juan Goytisolo, 37, 04002 Almería',
                'coordinates' => '36.8394227,-2.4772535',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 09',
                'address' => 'C. Murcia, 41, 04004 Almería',
                'coordinates' => '36.8431794,-2.4610007',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 10',
                'address' => 'Av. de Cabo de Gata, 106, 04007 Almería',
                'coordinates' => '36.8302401,-2.4537265',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 11',
                'address' => 'C. Antonio Muñoz Zamora, 20, 04007 Almería',
                'coordinates' => '36.8298415,-2.4505475',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 12',
                'address' => 'C. Celia Viñas, 8, 04007 Almería',
                'coordinates' => '36.8313018,-2.450114',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 13',
                'address' => 'Av. de Madrid, 4, 04007 Almería',
                'coordinates' => '36.8313685,-2.4498304',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 14',
                'address' => 'Plaza de la Villa, 5, 04250 Pechina, Almería',
                'coordinates' => '36.9139923,-2.4621463',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 15',
                'address' => 'C. Sevilla, 54, 04410 Benahadux, Almería',
                'coordinates' => '36.9139923,-2.4621463',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 16',
                'address' => 'C. Sevilla, 40, 04410 Benahadux, Almería',
                'coordinates' => '36.9260982,-2.4594455',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 17',
                'address' => 'Av. de Carlos III, 565, 04720 Aguadulce, Almería',
                'coordinates' => '36.8155801,-2.5692223',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 18',
                'address' => 'Av. del Guadalquivir, 2, 04738 La Gangosa, Almería',
                'coordinates' => '36.8048239,-2.6255114',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 19',
                'address' => 'C. Alcalá, 8, 04738 Las Cabañuelas, Almería',
                'coordinates' => '36.8048333,-2.6294287',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 20',
                'address' => 'C. del Agua, 15, 04738 Puebla de Vícar, Almería',
                'coordinates' => '36.7949556,-2.6436534',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 21',
                'address' => 'boulevard de la union europea, 141, 04738 Barrio Archilla, Almería',
                'coordinates' => '36.7917252,-2.6385036',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 22',
                'address' => 'Calle Congo, nº13, 04738 Puebla de Vícar, Almería',
                'coordinates' => '36.7862262,-2.6348987',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 23',
                'address' => 'C. Rosalía de Castro, 14, 04700 El Ejido, Almería',
                'coordinates' => '36.7598209,-2.8246151',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 24',
                'address' => 'Carr. Venta de Pampanico, 368, 04719 Pampanico, Almería',
                'coordinates' => '36.7598209,-2.8246151',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 25',
                'address' => 'de nº, Av. Daza, 122, 04710 Santa María del Águila, Almería',
                'coordinates' => '36.7657365,-2.8149058',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 26',
                'address' => 'C. Manolo Escobar, 11, 04700 El Ejido, Almería',
                'coordinates' => '36.7650717,-2.8141842',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 27',
                'address' => 'Calle Almte., 2, 04700 El Ejido, Almería',
                'coordinates' => '36.7650717,-2.8141842',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 28',
                'address' => 'C. Varadero, 5, 04711 Almerimar, Almería',
                'coordinates' => '36.693554,-2.7924145',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 29',
                'address' => 'Av. de las Marinas, 186, 04740 Roquetas de Mar, Almería',
                'coordinates' => '36.7315425,-2.6574672',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 30',
                'address' => 'Av. Mariano Hernández, 103, 04740 Roquetas de Mar, Almería',
                'coordinates' => '36.7315425,-2.6574672',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ]
        ]);
    }
}
