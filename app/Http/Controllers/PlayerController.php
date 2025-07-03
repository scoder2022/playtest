<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function simulateMatch() {
        $players = \App\Models\Player::all();

        foreach ($players as $player) {
            $player->update([
                'is_alive' => rand(0, 1),
                'is_knocked' => rand(0, 1),
                'eliminations' => rand(0, 6),
                'in_blue_zone' => rand(0, 1),
            ]);
        }

        return response()->json(['message' => 'Match simulated']);
    }
}
