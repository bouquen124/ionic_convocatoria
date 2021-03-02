<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_estudiantes')->insert([

            'c_clinica_id' => '1',
            'c_profesional_id' => '1',
            'nombre' => 'Estudiante_1',
            'telefono' => '9511112333',
            'correo' => '111111@gmai.com',
            'localidad' => 'Oaxaca',
        ]);

        
        DB::table('c_estudiantes')->insert([

            'c_clinica_id' => '2',
            'c_profesional_id' => '2',
            'nombre' => 'Estudiante_2',
            'telefono' => '9522222333',
            'correo' => '222@gmai.com',
            'localidad' => 'Oaxaca',
        ]);

        
        DB::table('c_estudiantes')->insert([

            'c_clinica_id' => '1',
            'c_profesional_id' => '1',
            'nombre' => 'Estudiante_3',
            'telefono' => '954433333',
            'correo' => '33333@gmai.com',
            'localidad' => 'Oaxaca',
        ]);

        
        DB::table('c_estudiantes')->insert([

            'c_clinica_id' => '3',
            'c_profesional_id' => '3',
            'nombre' => 'Estudiante_4',
            'telefono' => '954444544',
            'correo' => '4444@gmai.com',
            'localidad' => 'Oaxaca',
        ]);
    }
}
