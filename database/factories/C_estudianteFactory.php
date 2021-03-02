<?php

namespace Database\Factories;

use App\Models\C_estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class C_estudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = C_estudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'c_clinica_id' => $this->faker->randomDigitNotNull,
        'c_profesional_id' => $this->faker->randomDigitNotNull,
        'nombre' => $this->faker->word,
        'telefono' => $this->faker->word,
        'correo' => $this->faker->word,
        'localidad' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
