<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Models\Type;
use Illuminate\Http\Request;

class CardController  extends Controller
{
    public function showCards(){
        return response(['cards' => Card::where('kind', !'null')->get()]);
    }

    public function addCard(Request $request){
        $fields = $request->validate([
            'kind' => 'required|string',
            'ticks' => 'integer',
            'max_ticks' => 'required|integer',
            'refugee_id' => 'required|integer',
            'reward' => 'required|string',
        ]);

        $card= Card::create([
        'kind' => $fields['kind'],
        'ticks' =>$fields['ticks'],
        'max_ticks' =>$fields['max_ticks'],
        'refugee_id' =>$fields['refugee_id'],
        'reward' => $fields['reward']
        ]);
        return $card;
    }

    public function showTypes(){
        return response(['types' => Type::where('kind', !'null')->get()]);
    }
    public function addType(Request $request){
        $fields = $request->validate([
            'kind' => 'required|string',
            'reward' => 'required|string',
        ]);
        $type= Type::create([
            'kind' => $fields['kind'],
            'reward' => $fields['reward']
        ]);
        return $type;
    }


}
