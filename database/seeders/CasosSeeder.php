<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class CasosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_casos')->insert([
        'nombre' => 'primer caso',
        'descripcion' => 'descripcion',
        'fecha' => '2021-01-13 15:14:29',
        'c_profesional_id' => '1',
        't_usuario_id' => '1',
        'c_estado_id' => '1'
        ]);


        
        DB::table('t_casos')->insert([
            'nombre' => 'segundo caso',
            'descripcion' => 'descripcion_"222',
            'fecha' => '2021-01-15 15:14:29',
            'c_profesional_id' => '1',
            't_usuario_id' => '1',
            'c_estado_id' => '1'
        ]);

        
        DB::table('t_casos')->insert([
            'nombre' => 'tercer caso',
            'descripcion' => 'descripcion_333',
            'fecha' => '2021-01-16 15:14:29',
            'c_profesional_id' => '1',
            't_usuario_id' => '1',
            'c_estado_id' => '1'
        ]);

        
        DB::table('t_casos')->insert([
            'nombre' => 'caurto caso',
            'descripcion' => 'descripcion_4444',
            'fecha' => '2021-01-18 15:14:29',
            'c_profesional_id' => '1',
            't_usuario_id' => '1',
            'c_estado_id' => '1'
        ]);

    }
}
