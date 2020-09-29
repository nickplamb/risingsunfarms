<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'DOB' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'DOD' => $this->faker->optional(0.7)->date($format = 'Y-m-d', $max = 'now'),
            'species' => $this->faker->randomElement($array = array('dog', 'cat', 'rat', 'fish', 'chinchilla', 'parrot', 'snake')),
            'breed' => $this->faker->optional(0.8)->realText($maxNbChars = 10, $indexSize = 1),
            'sex' => $this->faker->optional(0.5)->randomElement($array = array('male', 'female')),
            'favorites' => $this->faker->optional(0.5)->realText($maxNbChars = 50, $indexSize = 1),
            'dislikes' => $this->faker->optional(0.5)->realText($maxNbChars = 50, $indexSize = 1),
            'origin_story' => $this->faker->optional(0.5)->realText($maxNbChars = 50, $indexSize = 1),
            'locations' => $this->faker->optional(0.8)->city()

            // 'name');
            // $table->date('DOB')->nullable();
            // $table->date('DOD')->nullable();
            // $table->string('species');
            // $table->string('breed')->nullable();
            // $table->text('favorites')->nullable();
            // $table->text('dislikes')->nullable();
            // $table->text('origin_story')->nullable(); //family, how we got them, where they lived
            // $table->text('locations')->nullable(); //what city they lived in.
            // $table->text('description')->nullable();
            // $table->string('photo_url'
        ];
    }
}
