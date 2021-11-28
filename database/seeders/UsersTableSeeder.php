<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alejandro',
            'last_names' => 'ADMIN',
            'email' => 'alejandro@deltrace.com',
            'password' => '$2y$10$jQ0EjR3x3s5R0OOdJjaA6O6x6.kS7a32WHWgRU7aZCtpKmmFSpdxu'
        ]);

        DB::table('users')->insert([
            'name' => 'EmilioADMIN',
            'last_names' => 'ADMIN',
            'email' => 'viserion1981@gmail.com',
            'password' => '$2y$10$Ntm8DR5yLXOi0dd4D95.XOPX2wqGgDBSptV71Tbk7OH/HzAIe.y2u'
        ]);

        User::factory()->count(30)->create();
    }
}
