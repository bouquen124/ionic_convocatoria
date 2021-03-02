<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class BoletinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_boletins')->insert([
            'c_profesional_id' => '1',
            'titulo' => 'Primer Boletin',
            'subtitulo' => 'subtitullo_1',
            'contenido' => 'contenido_contenido_1',
            'autor' => 'Juan'
        ]);

        
        DB::table('c_boletins')->insert([
            'c_profesional_id' => '2',
            'titulo' => 'segundo Boletin',
            'subtitulo' => 'subtitullo_2',
            'contenido' => 'contenido_contenido_2',
            'autor' => 'Pedro'
        ]);


        
        DB::table('c_boletins')->insert([
            'c_profesional_id' => '1',
            'titulo' => 'Tercer Boletin',
            'subtitulo' => 'subtitullo_3',
            'contenido' => 'contenido_contenido_3',
            'autor' => 'Andres'
        ]);

        
        DB::table('c_boletins')->insert([
            'c_profesional_id' => '1',
            'titulo' => 'Cuarto Boletin',
            'subtitulo' => 'subtitullo_4',
            'contenido' => 'contenido_contenido_4',
            'autor' => 'Rolando'
        ]);

        
        //
    }
}
