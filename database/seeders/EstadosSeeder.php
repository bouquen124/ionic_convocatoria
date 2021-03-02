<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
        DB::table('c_estados')->insert([
            'nombre' => 'Pendiente',
            'descripcion' => 'descripcion_1'
        ]);
                 
        DB::table('c_estados')->insert([
            'nombre' => 'En seguimiento',
            'descripcion' => 'descripcion_2'
        ]);         

        DB::table('c_estados')->insert([
            'nombre' => 'Atendido',
            'descripcion' => 'descripcion_3'
        ]);         

        DB::table('c_estados')->insert([
            'nombre' => 'Cancelado',
            'descripcion' => 'descripcion_4'
        ]);
    
    }
}
