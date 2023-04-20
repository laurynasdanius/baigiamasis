<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Event::create([
            'title' => 'Event 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'location' => 'New York City',
            'start_time' => Carbon::parse('2022-05-01 10:00:00'),
            'end_time' => Carbon::parse('2022-05-01 16:00:00'),
        ]);

        Event::create([
            'title' => 'Event 2',
            'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'location' => 'Los Angeles',
            'start_time' => Carbon::parse('2022-06-15 09:00:00'),
            'end_time' => Carbon::parse('2022-06-15 17:00:00'),
        ]);

        Event::create([
            'title' => 'Event 3',
            'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'location' => 'Chicago',
            'start_time' => Carbon::parse('2022-07-22 12:00:00'),
            'end_time' => Carbon::parse('2022-07-23 12:00:00'),
        ]);
        Event::create([
            'title' => 'Event 4',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'location' => 'New York City',
            'start_time' => Carbon::parse('2022-05-01 10:00:00'),
            'end_time' => Carbon::parse('2022-05-01 16:00:00'),
        ]);

        Event::create([
            'title' => 'Event 5',
            'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'location' => 'Los Angeles',
            'start_time' => Carbon::parse('2022-06-15 09:00:00'),
            'end_time' => Carbon::parse('2022-06-15 17:00:00'),
        ]);

        Event::create([
            'title' => 'Event 6',
            'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'location' => 'Chicago',
            'start_time' => Carbon::parse('2022-07-22 12:00:00'),
            'end_time' => Carbon::parse('2022-07-23 12:00:00'),
        ]);
        Event::create([
            'title' => 'Event 7',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'location' => 'New York City',
            'start_time' => Carbon::parse('2022-05-01 10:00:00'),
            'end_time' => Carbon::parse('2022-05-01 16:00:00'),
        ]);

        Event::create([
            'title' => 'Event 8',
            'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'location' => 'Los Angeles',
            'start_time' => Carbon::parse('2022-06-15 09:00:00'),
            'end_time' => Carbon::parse('2022-06-15 17:00:00'),
        ]);

        Event::create([
            'title' => 'Event 9',
            'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'location' => 'Chicago',
            'start_time' => Carbon::parse('2022-07-22 12:00:00'),
            'end_time' => Carbon::parse('2022-07-23 12:00:00'),
        ]);
    }
}
