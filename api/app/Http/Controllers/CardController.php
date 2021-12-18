<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Models\Type;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class CardController  extends Controller
{
    public function showCards(){
        return response(['cards' => Card::where('name', !'null')->get()]);
    }

    public function showCardsForRefugee(User $user){
        return response(['cards' => Card::where('refugee_id', $user['id'])->get()]);
    }

    public function addCard(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'refugee_id' => 'required|integer'
        ]);
        $card= Card::create([
        'name' => $fields['name'],
        'refugee_id' => $fields['refugee_id']
        ]);
        return $card;
    }
    public function showCardTasks(Request $request){
        return response(['tasks' => Task::where('card_id', $request['card_id'])->get()]);
}
    public function addTask(Request $request){
        $fields = $request->validate([
            'kind' => 'required|string',
            'ticks' => 'integer',
            'max_ticks' => 'required|integer',
            'reward' => 'required|string',

        ]);

        $task= Task::create([
        'kind' => $fields['kind'],
        'ticks' =>$fields['ticks'],
        'max_ticks' =>$fields['max_ticks'],
        'reward' => $fields['reward']
        ]);
        return $task;
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
