<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Type extends Authenticatable
{

    protected $fillable=[
        'kind',
        'reward'
    ];
}
