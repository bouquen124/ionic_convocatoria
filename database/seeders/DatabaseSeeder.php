<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(EstadosSeeder::class);
        $this->call(TiposSeeder::class);
        $this->call(ClinicasSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(ProfesionalesSeeder::class);
        $this->call(EstudiantesSeeder::class);
        $this->call(CasosSeeder::class);
        $this->call(BoletinesSeeder::class);
    }
}
