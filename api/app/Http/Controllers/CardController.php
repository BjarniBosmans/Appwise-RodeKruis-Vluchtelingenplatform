<?php

namespace App\Http\Controllers;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController  extends Controller
{
    public function showCards(){
        return response(['cards' => Card::where('kind', !'null')->get()]);
    }

    public function addCard(Request $request){
        $card= Card::create([
        'kind' => $request->input('kind'),
        'ticks' =>$request->input('ticks'),
        'max_ticks' =>$request->input('max_ticks'),
        'refugee_id' =>$request->input('refugee_id'),
        'reward' => $request->input('reward')
        ]);
        return $card;
    }


}
