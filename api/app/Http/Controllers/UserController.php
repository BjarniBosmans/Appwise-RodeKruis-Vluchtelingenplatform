<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Request;

class UserController extends Controller
{

    public function showRefugees(){
        return response(['users' => User::where('role', 'refugee')->get()]);
    }

    public function showAttendants(){
        return response(['users' => User::where('role', 'attendant')->get()]);
    }

    public function addRefugee(){
        $user= User::create([

        ]);

    }

    public function showUser(User $user){

    }

    public function deactivateUser(User $user){
        $user->delete();
        return redirect()->to('/');

    }

    public function generateUniqueCode(){
        $chars= '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeLength=6;
        $charNumber= strlen($chars);

        $code='';

        while(strlen($code) < $codeLength){
        $position= rand(0, $charNumber -1);
        $char= $chars[$position];
        $code= $code.$char;
        }

        if(User::where('code', $code)->exists()){
        $this->generateUniqueCode();
        }

        return $code;

    }

}
