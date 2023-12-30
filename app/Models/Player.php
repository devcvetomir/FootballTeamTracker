<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'age',
        'nationality',
        'goals_season',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    public function team() {
        return $this->belongsTo(Team::class,'team_id');
    }


}
