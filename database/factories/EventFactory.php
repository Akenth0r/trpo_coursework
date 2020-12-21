<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = array("концерт", "шоу", "спектакль");
        return [
            'title' => $this->faker->sentence(),
            'type' => $types[random_int(0, 2)],
            'description' => $this->faker->text(200),
            'place' => $this->faker->text("20"),
            'date' => $this->faker->dateTimeThisYear(),
        ];
    }

}
