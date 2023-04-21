<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rooms = [
            [
                'name' => 'Conference Room 1',
                'description' => 'A large conference room.',
                'capacity' => 50,
            ],
            [
                'name' => 'Conference Room 2',
                'description' => 'A large conference room.',
                'capacity' => 10,
            ],
            [
                'name' => 'Conference Room 3',
                'description' => 'A large conference room.',
                'capacity' => 20,
            ],
            [
                'name' => 'Conference Room 4',
                'description' => 'A large conference room.',
                'capacity' => 5,
            ],
            [
                'name' => 'Conference Room 5',
                'description' => 'A large conference room.',
                'capacity' => 2,
            ],
            [
                'name' => 'Conference Room 6',
                'description' => 'A large conference room.',
                'capacity' => 3,
            ],
            // Add more rooms here
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
}
}
