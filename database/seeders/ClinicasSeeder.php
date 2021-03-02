<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class ClinicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_clinicas')->insert([
            'nombre' => 'primera_clinica',
            'direccion'=> 'direccion_preimera',
            'telefono'=> '9517418563',
            'correo'=> 'correo@gll.com'
        ]);


        DB::table('c_clinicas')->insert([
            'nombre' => 'segunda_clinica',
            'direccion'=> 'direccion_segunda',
            'telefono'=> '9517418563',
            'correo'=> 'correo@gll.com'
        ]);

        DB::table('c_clinicas')->insert([
            'nombre' => 'tercera_clinica',
            'direccion'=> 'direccion_tercera',
            'telefono'=> '9517418563',
            'correo' =>'correo@gll.com'
        ]);

        DB::table('c_clinicas')->insert([
            'nombre' => 'cuarta_clinica',
            'direccion'=> 'direccion_cuarta',
            'telefono'=> '9517418563',
            'correo'=> 'correo@gll.com'
        ]);
    }
}
