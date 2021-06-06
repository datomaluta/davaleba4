<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        return response(['user'=>$user]);
    }

    public function login(LoginRequest $request){
        if(!auth()->attempt($request->all())){
            return response(['message'=>'incorrect credentials']);
        }
        $token = auth()->user()->createToken('Api Token')->accsessToken;

        return  response(['user'=>auth()->user(), 'tokens' => $token]);
    }
}
