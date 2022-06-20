<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BarcodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barcodes')->insert([
            [
                'code' => '9780201379624',
                'name' => 'Goiko',
                'address' => 'C. Rbla. Obispo Orberá, 11, 04001 Almería, España'
            ],
            [
                'code' => '7962443020133',
                'name' => 'Heladería Punto Italia',
                'address' => 'Av. Federico García Lorca, 110, 04005 Almería' 
            ],
            [
                'code' => '2456725468546',
                'name' => 'Scondite Bar',
                'address' => 'C. Gil Vicente, 10, 04006 Almería'
            ],
            [
                'code' => '5151585448826',
                'name' => 'IES Celia Viñas',
                'address' => 'IES Celia Viñas, Calle Javier Sanz, Almería'
            ],
            [
                'code' => '5111213214698',
                'name' => 'La Luna',
                'address' => 'Café, Pub "La Luna", Calle Doctor Giménez Canga Argüelles, Almería'
            ],
        ]);
    }
}
