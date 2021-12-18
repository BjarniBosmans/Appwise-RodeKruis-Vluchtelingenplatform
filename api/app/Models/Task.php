<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Task extends Model
{
    protected $fillable=[
    'card_id',
    'kind',
    'ticks',
    'max_ticks',
    'reward',
    'completed',
    'reward_delivered'
    ];

    public function card(){
        return $this->belongsTo(Card::class);
    }
}
