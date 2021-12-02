<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function showRefugees(){
        return response(['users' => User::where('role', 'refugee')->get()]);
    }

    public function showAttendants(){
        return response(['users' => User::where('role', 'attendant')->get()]);
    }

    public function addRefugee(Request $request){
        $fields = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'role' => 'required|string',
            'country_of_origin' => 'required|string',
        ]);
        $unique_code= $this->generateUniqueCode();
        $user= User::create([
        'firstname' => $fields['firstname'],
        'lastname' => $fields['lastname'],
        'email' => $fields['email'],
        'unique_code' => $unique_code,
        'password' => bcrypt($unique_code),
        'role' => $fields['role'],
        'country_of_origin' => $fields['country_of_origin'],

        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function addAttendant(Request $request){
        $fields = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        $user= User::create([
            'firstname' => $fields['firstname'],
            'lastname' => $fields['lastname'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role' => $fields['role']
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
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
