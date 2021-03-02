<?php

namespace Database\Factories;

use App\Models\T_usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class T_usuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = T_usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'c_tipo_id' => $this->faker->randomDigitNotNull,
        'nombre' => $this->faker->word,
        'edad' => $this->faker->randomDigitNotNull,
        'localidad' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
