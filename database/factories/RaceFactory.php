<?php

namespace Database\Factories;

use App\Models\{Race, Species};
use Illuminate\Database\Eloquent\Factories\Factory;

class RaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Race::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'species_id' => Species::class,
            'name' => $this->faker->name(),
        ];
    }
}
