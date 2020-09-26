<?php

namespace Database\Factories;

use App\Models\Egg;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EggFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Egg::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'chicken_name' => $this->faker->firstNameFemale,
            'weight' => $this->faker->numberBetween($min = 35, $max = 60),
            'layed_on' =>$this->faker->dateTimeThisYear($max = 'now', $timezone = 'America/New_York'),
            'comments' =>$this->faker->realText($maxNbChars = 50, $indexSize = 2)
        ];
    }
}
