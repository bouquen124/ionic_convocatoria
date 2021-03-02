<?php

namespace Database\Factories;

use App\Models\C_clinica;
use Illuminate\Database\Eloquent\Factories\Factory;

class C_clinicaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = C_clinica::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        'direccion' => $this->faker->word,
        'telefono' => $this->faker->word,
        'correo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
