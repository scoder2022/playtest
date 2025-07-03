<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Player;


class TeamAndPlayerSeeder extends Seeder
{
    public function run()
    {
        Team::factory()
            ->count(4) // 4 teams only
            ->create()
            ->each(function ($team) {
                // Each team has 1 to 4 players
                Player::factory()->count(rand(1, 4))->create([
                    'team_id' => $team->id,
                ]);
            });
    }

}
