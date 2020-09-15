<?php

namespace Database\Factories;

use App\Models\Chickens;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChickensFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chickens::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'egg_color' => $this->faker->colorName,
            'DOB' => $this->faker->date,
            'breed' => realText($maxNbChars = 50, $indexSize = 2),
        ];
    }
}
