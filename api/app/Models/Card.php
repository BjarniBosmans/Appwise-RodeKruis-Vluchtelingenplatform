<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Card extends Model
{
    protected $fillable=[
        'name',
        'refugee_id',
        'ticks',
        'total_ticks'
    ];

    public function refugee(){
        return $this->belongsTo(User::class);
}
    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
