<?php

namespace App\Http\Controllers;
use App\Models\Card;

class CardController
{

    public function showCards(){
        return response(['cards']);
    }
}
