<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function showRefugees(){
        return response(['users' => User::where('role', 'refugee')->get()]);
    }

    public function showAttendants(){

    }

    public function showUser(User $user){

    }

    public function deactivateUser(User $user){

    }

}
