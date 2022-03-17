<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alejandro',
            'last_name' => 'Berenguel Bustos',
            'email' => 'alejandro@deltrace.com',
            'password' => '$2y$10$jQ0EjR3x3s5R0OOdJjaA6O6x6.kS7a32WHWgRU7aZCtpKmmFSpdxu'
        ])->assignRole('Admin');

        User::create([
            'name' => 'Emilio',
            'last_name' => 'Garcia Iglesias',
            'email' => 'viserion1981@gmail.com',
            'password' => '$2y$10$jQ0EjR3x3s5R0OOdJjaA6O6x6.kS7a32WHWgRU7aZCtpKmmFSpdxu'
        ])->assignRole('Admin');

        User::factory()->count(30)->create();
    }
}
