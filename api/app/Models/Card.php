<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Card extends Authenticatable
{

    protected $fillable=[
        'kind',
        'refugee_id',
        'ticks',
        'max_ticks',
        'reward',
        'completed',
        'reward_delivered'
    ];


}
