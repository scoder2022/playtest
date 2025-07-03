<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getWinningChances()
    {
        $teams = Team::with('players')->get();

        $scores = [];
        foreach ($teams as $team) {
            $score = 1;
            foreach ($team->players as $player) {
                $score += $player->is_alive ? 15 : 0;
                $score += $player->eliminations * 2;
                $score -= $player->is_knocked ? 2 : 0;
                $score += $player->in_blue_zone ? 2 : 0;
            }
            $scores[$team->id] = $score;
        }

        $total = array_sum($scores);

        //  winning percentage
        $result = [];
        foreach ($teams as $team) {
            $percentage = $total > 0 ? round(($scores[$team->id] / $total) * 100, 2) : 0;
            $result[] = [
                'id' => $team->id,
                'name' => $team->name,
                'winning_percentage' => $percentage,
            ];
        }

        return response()->json(['teams' => $result]);
    }

}
