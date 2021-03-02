<?php

namespace Database\Factories;

use App\Models\T_casos;
use Illuminate\Database\Eloquent\Factories\Factory;

class T_casosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = T_casos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'fecha' => $this->faker->word,
        'c_profesional_id' => $this->faker->randomDigitNotNull,
        't_usuario_id' => $this->faker->randomDigitNotNull,
        'c_estado_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
