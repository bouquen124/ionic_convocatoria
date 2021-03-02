<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class ProfesionalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_profesionals')->insert([
            'c_clinica_id'=> '1',
            'nombre'=> 'Juan',
            'telefono'=> '9518529647',
            'correo' => 'correo@gmail.com',
            'localidad' => 'Oaxaca'
        ]);

        
        DB::table('c_profesionals')->insert([
            'c_clinica_id'=> '2',
            'nombre'=> 'Antonio',
            'telefono'=> '9518559647',
            'correo' => 'correo@gmail.com',
            'localidad' => 'Oaxaca'
        ]);

        
        DB::table('c_profesionals')->insert([
            'c_clinica_id'=> '3',
            'nombre'=> 'Pablo',
            'telefono'=> '9518529647',
            'correo' => 'correo@gmail.com',
            'localidad' => 'Oaxaca'
        ]);

        
        DB::table('c_profesionals')->insert([
            'c_clinica_id'=> '1',
            'nombre'=> 'Pedro',
            'telefono'=> '9518529647',
            'correo' => 'correo@gmail.com',
            'localidad' => 'Oaxaca'
        ]);
    }
}
