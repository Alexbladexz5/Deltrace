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
                'latitude' => '36.8478632',
                'longitude' => '-2.4527225',
                'name_address' => 'Farmacia Bola Azul',
                'estimated_time' => '2021-12-21 20:00:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 02',
                'address' => 'Av. del Mediterráneo, 414, 04009 Almería',
                'latitude' => '36.8537259',
                'longitude' => '-2.4438188',
                'name_address' => 'Farmacia 365 días 12Horas / Lda. Yolanda Sierra Posso',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 03',
                'address' => 'C. Faura, 93, 04760 Berja, Almería',
                'latitude' => '36.842332714217264',
                'longitude' => '-2.947708699605615',
                'name_address' => 'Farmacia Baumela',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 04',
                'address' => 'Calle Mayor, 144, 04630 Garrucha, Almería',
                'latitude' => '37.119069268208555',
                'longitude' => '-1.834703652029471',
                'name_address' => 'Farmacia Moldenhauer',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 05',
                'address' => 'P.º del Mediterráneo, 19D, 04638 Mojácar, Almería',
                'latitude' => '37.180129600890609',
                'longitude' => '-1.822453668867373',
                'name_address' => 'Farmacia Francisco Javier Salas Navarro',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 06',
                'address' => 'C. Silos, 14, 04638 Mojácar, Almería',
                'latitude' => '37.139239',
                'longitude' => '-1.853130',
                'name_address' => 'Farmacia Mojácar Pueblo',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 07',
                'address' => 'C. Pedro Jover, 49, 04002 Almería',
                'latitude' => '36.838277',
                'longitude' => '-2.471849',
                'name_address' => 'Farmacia Oña Compan',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 08',
                'address' => 'C. Juan Goytisolo, 37, 04002 Almería',
                'latitude' => '36.8394227',
                'longitude' => '-2.4772535',
                'name_address' => 'Farmacia Gómez Coronado León',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 09',
                'address' => 'C. Murcia, 41, 04004 Almería',
                'latitude' => '36.8431794',
                'longitude' => '-2.4610007',
                'name_address' => 'Farmacia Vivas Pérez',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 10',
                'address' => 'Av. de Cabo de Gata, 106, 04007 Almería',
                'latitude' => '36.8302401',
                'longitude' => '-2.4537265',
                'name_address' => 'Farmacia María Del Mar González Llorca',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 11',
                'address' => 'C. Antonio Muñoz Zamora, 20, 04007 Almería',
                'latitude' => '36.8298415',
                'longitude' => '-2.4505475',
                'name_address' => 'Farmacia Villalobos',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 12',
                'address' => 'C. Celia Viñas, 8, 04007 Almería',
                'latitude' => '36.8313018',
                'longitude' => '-2.450114',
                'name_address' => 'Farmacia Sonia Vargas',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 13',
                'address' => 'Av. de Madrid, 4, 04007 Almería',
                'latitude' => '36.8313685',
                'longitude' => '-2.4498304',
                'name_address' => 'Farmacia Ros Delgado CB',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 14',
                'address' => 'Plaza de la Villa, 5, 04250 Pechina, Almería',
                'latitude' => '36.9164733',
                'longitude' => '-2.4403882',
                'name_address' => 'Farmacia Gador Navarrete',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 15',
                'address' => 'C. Sevilla, 40, 04410 Benahadux, Almería',
                'latitude' => '36.9285874',
                'longitude' => '-2.4603038',
                'name_address' => 'Farmacia Benahadux',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 16',
                'address' => 'Pl. de la Constitucion, 11, 04260 Rioja, Almería',
                'latitude' => '36.9436196',
                'longitude' => '-2.462562',
                'name_address' => 'Farmacia De Rioja C.B',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 17',
                'address' => 'Av. de Carlos III, 565, 04720 Aguadulce, Almería',
                'latitude' => '36.8155801',
                'longitude' => '-2.5692223',
                'name_address' => 'Farmacia Aguadulce',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 18',
                'address' => 'Av. del Guadalquivir, 2, 04738 La Gangosa, Almería',
                'latitude' => '36.8048239',
                'longitude' => '-2.6255114',
                'name_address' => 'Farmacia Los Canos, Lda. Rosa María López Gómez',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 19',
                'address' => 'C. Alcalá, 8, 04738 Las Cabañuelas, Almería',
                'latitude' => '36.8048333',
                'longitude' => '-2.6294287',
                'name_address' => 'Farmacia María Trinidad Rodríguez',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 20',
                'address' => 'C. del Agua, 15, 04738 Puebla de Vícar, Almería',
                'latitude' => '36.7949556',
                'longitude' => '-2.6436534',
                'name_address' => 'Farmacia Puebla de Vicar Lda: Silvia Soler Soria',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 21',
                'address' => 'boulevard de la union europea, 141, 04738 Barrio Archilla, Almería',
                'latitude' => '36.7917252',
                'longitude' => '-2.6385036',
                'name_address' => 'Farmacia Archilla',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 22',
                'address' => 'Calle Congo, nº13, 04738 Puebla de Vícar, Almería',
                'latitude' => '36.7862262',
                'longitude' => '-2.6348987',
                'name_address' => 'Farmacia Ldo. Pedro José Fuentes Fdez',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 23',
                'address' => 'C. Rosalía de Castro, 14, 04700 El Ejido, Almería',
                'latitude' => '36.7598209',
                'longitude' => '-2.8246151',
                'name_address' => 'Farmacia Amalia Liria Sánchez',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 24',
                'address' => 'Carr. Venta de Pampanico, 368, 04719 Pampanico, Almería',
                'latitude' => '36.7598209',
                'longitude' => '-2.8246151',
                'name_address' => 'Farmacia Pampanico',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 25',
                'address' => 'de nº, Av. Daza, 122, 04710 Santa María del Águila, Almería',
                'latitude' => '36.7657365',
                'longitude' => '-2.8149058',
                'name_address' => 'Farmacia Caparrós Y Reina C B',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 26',
                'address' => 'Blvr. de el Ejido, 195, 04700 El Ejido, Almería',
                'latitude' => '36.7728569',
                'longitude' => '-2.8212966',
                'name_address' => 'Farmacia Bulevar El Ejido',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 27',
                'address' => 'Calle Almte., 2, 04700 El Ejido, Almería',
                'latitude' => '36.7650717',
                'longitude' => '-2.8141842',
                'name_address' => 'Farmacia Salvador Linares',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 28',
                'address' => 'C. Galera, 30, 04711 Almerimar, Almería',
                'latitude' => '36.6958685',
                'longitude' => '-2.7898509',
                'name_address' => 'Farmacia Almerimar',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 29',
                'address' => 'Av. de las Marinas, 186, 04740 Roquetas de Mar, Almería',
                'latitude' => '36.7315425',
                'longitude' => '-2.6574672',
                'name_address' => 'Farmacia Jiménez Sánchez (Las Marinas)',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ],
            [
                'name' => 'Entrega 30',
                'address' => 'Avenida Sabinar, 309, 04740 Roquetas de Mar, Almería',
                'latitude' => '36.7418322',
                'longitude' => '-2.6175309',
                'name_address' => 'Farmacia Domínguez',
                'estimated_time' => '2021-12-21 20:15:00',
                'route_id' => '2'
            ]
        ]);
    }
}
