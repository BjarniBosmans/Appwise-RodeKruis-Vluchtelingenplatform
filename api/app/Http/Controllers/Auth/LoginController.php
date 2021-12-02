<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function loginRefugee(Request $request){
        if(!auth()->attempt($request->only('unique_code', 'password'))) {
            throw new AuthenticationException();
        }
    }

    public function login(Request $request){
        if(!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        }
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }

}
