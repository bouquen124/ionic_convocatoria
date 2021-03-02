<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_usuarios')->insert([
            'c_tipo_id' => '1',
            'nombre'=> 'Usuario_1',
            'edad'=> '22',
            'localidad'=> 'Oaxaca'
        ]);

        
        DB::table('t_usuarios')->insert([
            'c_tipo_id' => '1',
            'nombre'=> 'Usuario_2',
            'edad'=> '23',
            'localidad'=> 'Oaxaca'
        ]);

        
        DB::table('t_usuarios')->insert([
            'c_tipo_id' => '1',
            'nombre'=> 'Usuario_3',
            'edad'=> '23',
            'localidad'=> 'Oaxaca'
        ]);

        
        DB::table('t_usuarios')->insert([
            'c_tipo_id' => '1',
            'nombre'=> 'Usuario_4',
            'edad'=> '24',
            'localidad'=> 'Oaxaca'
        ]);
    }
}
