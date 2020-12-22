<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $placeType = [
            "балкон",
            "ложа",
            "бельэтаж",
            "vip",
        ];
        $status = 'есть в наличии';
        return [
            'row' => $this->faker->numberBetween(1, 10),
            'placeNum' => $this->faker->numberBetween(1, 20),
            'cost' => $this->faker->randomFloat(3, 3),
            'placeType' => $placeType[random_int(0, 3)],
            'status' => $status,
        ];
    }
}
