<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
                
        DB::table('c_tipos')->insert([
            'nombre' => 'Profesional',
            'descripcion' => 'descripcion_2'
        ]);


              
        DB::table('c_tipos')->insert([
            'nombre' => 'Alumno',
            'descripcion' => 'descripcion_3'
        ]);


              
        DB::table('c_tipos')->insert([
            'nombre' => 'Interesada',
            'descripcion' => 'descripcion_4'
        ]);
    }
}
