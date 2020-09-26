<?php

namespace Database\Factories;

use App\Models\Chicken;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChickenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chicken::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstNameFemale,
            'egg_color' => $this->faker->randomElement($array = array('Brown', 'Blueish', 'Greenish','White', 'no')),
            'DOB' => $this->faker->dateTimeThisYear($max = '2020-07-27', $timezone = 'America/New_York'),
            'chicken_sex' => $this->faker->randomElement($array = array('hen', 'rooster')),
            'breed' => $this->faker->randomElement($array = array('Silver Laced Wyandotte', 'Cream Legbar', 'Black Austrolorpe', 'Easter Egger'))
        ];
    }
}
            // 'name'
            // 'DOB'
            // 'DOD')->nullable();
            // 'chicken_sex'
            // 'egg_color'
            // 'breed'
            // 'comments')->nullable();
            // 'photo_url')->nullable();