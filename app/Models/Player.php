<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name','team_id','is_alive','is_knocked','eliminations','in_blue_zone'];
    use HasFactory;
    public function team() {
        return $this->belongsTo(Team::class);
    }

}
