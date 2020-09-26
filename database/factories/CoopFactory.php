<?php

namespace Database\Factories;

use App\Models\Coop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CoopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'inside_humidity' => $this->faker->numberBetween($min = 10, $max = 100),
            'inside_temperature' => $this->faker->numberBetween($min = -20, $max = 110),
            'outside_humidity' => $this->faker->numberBetween($min = 10, $max = 100),
            'outside_temperature' => $this->faker->numberBetween($min = -20, $max = 110),
            'door_locked' => $this->faker->numberBetween($min = 0, $max = 1),
            'battery_status' =>$this->faker->randomElement($array = array('Not Charging','Bad Battery','Charging','NTC Fault'))
        ];
    }
}
