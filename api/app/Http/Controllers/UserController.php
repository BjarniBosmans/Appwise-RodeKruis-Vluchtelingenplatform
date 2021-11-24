<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showRefugees(){
        return response(['users' => User::where('role', 'refugee')->get()]);
    }

    public function showAttendants(){
        return response(['users' => User::where('role', 'attendant')->get()]);
    }

    public function addRefugee(Request $request){
        $user= User::create([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'role' => $request->input('role'),
        'country_of_origin' => $request->input('country_of_origin'),
        'unique_code' => $this->generateUniqueCode()
        ]);
        return $user;
    }

    public function addAttendant(Request $request){
        $user= User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => $request->input('password'),

        ]);
        return $user;
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

        $unique_code='';

        while(strlen($unique_code) < $codeLength){
        $position= rand(0, $charNumber -1);
        $char= $chars[$position];
        $unique_code= $unique_code.$char;
        }

        if(User::where('unique_code', $unique_code)->exists()){
        $this->generateUniqueCode();
        }

        return $unique_code;

    }

}
