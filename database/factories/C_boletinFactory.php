<?php

namespace Database\Factories;

use App\Models\C_boletin;
use Illuminate\Database\Eloquent\Factories\Factory;

class C_boletinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = C_boletin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'c_profesional_id' => $this->faker->randomDigitNotNull,
        'titulo' => $this->faker->word,
        'subtitulo' => $this->faker->word,
        'contenido' => $this->faker->word,
        'autor' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
