<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Administrador',
            'email'=>'Administrador@gmail.com',
            'password'=>bcrypt('123456789')
        ]);
    
    }
}
