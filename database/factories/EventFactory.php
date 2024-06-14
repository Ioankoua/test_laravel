<?php

namespace Database\Factories;

use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = \App\Models\Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'poster' => $this->faker->imageUrl(1200, 800, 'event', true),
            'event_date' => $this->faker->date,
            'venue_id' => Venue::factory(), // Создает связанный объект Venue
        ];
    }
}
