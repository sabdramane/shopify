<?php

namespace Database\Factories;

use App\Models\Livre;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "libelle" => $this->faker->unique()->realText(20),
            "description" => $this->faker->text(50),
            "prix" => $this->faker->numberBetween(500, 1000000)
        ];
    }
}
