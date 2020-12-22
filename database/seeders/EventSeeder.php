<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()
            ->times(50)
            ->create()->each(function ($event) {
                $event->tickets()->saveMany(Ticket::factory()->times(random_int(20, 30))->make());
            });
    }
}
