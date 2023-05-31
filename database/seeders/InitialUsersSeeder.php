<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'super@example.com',
            'password' => Hash::make('super123'),
        ]);

        $adminTeam = Team::create([
            'user_id' => $admin->id,
            'name' => 'Administrator',
            'personal_team' => true,
        ]);

        $admin->current_team_id = $adminTeam->id;   
        $admin->save();

        $raspberryViewUser = User::create([
            'name' => 'RaspberryView',
            'email' => 'raspberryview@example.com',
            'password' => Hash::make('raspberryview123'),
        ]);

        $raspberryViewTeam = Team::create([
            'user_id' => $raspberryViewUser->id,
            'name' => 'RaspberryView',
            'personal_team' => true,
        ]);

        $raspberryViewUser->current_team_id = $raspberryViewTeam->id;
        $raspberryViewUser->save();
    }
}
