<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VenueFactory extends Factory
{
    protected $model = \App\Models\Venue::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
        ];
    }
}
