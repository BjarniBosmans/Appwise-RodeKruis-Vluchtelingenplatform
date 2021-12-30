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
    public function showCardTasks(Card $card){
        return response(['tasks' => Task::where('card_id', $card['id'])->get()]);
}
    public function addTask(Request $request){
        $fields = $request->validate([
            'kind' => 'required|string',
            'ticks' => 'integer',
            'max_ticks' => 'required|integer',
            'reward' => 'required|string',
            'card_id' => 'required'
        ]);

        $task= Task::create([
        'kind' => $fields['kind'],
        'ticks' =>$fields['ticks'],
        'max_ticks' =>$fields['max_ticks'],
        'reward' => $fields['reward'],
        'card_id' => $fields['card_id']
        ]);
        return $task;
    }

    public function changeTaskTicks(Request $request){
        $currentTask= Task::where('id', $request->input('id'))->first();

        $currentTask->ticks= $request->input('ticks');

        $currentTask->save();
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
