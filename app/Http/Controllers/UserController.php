<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function login(Request $request){


        $field = $request->validate([
            'username' =>'required|string',
            'password' => 'required|string'
        ]);

        $user =User::where('username',$field['username'])->first() ;
        if(!$user){
            return response()->json([
               'message' => 'user not found'
            ],404);
        }
        if(!Hash::check($field['password'],$user->password)){
            return response()->json([
               'message' => 'password not match'
            ],404);
        }
        else{
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
               'message' => 'login success',
               'token' => $token,
               'user' => $user
            ],200);
        }

    }
    public function register(Request $request){

        $field = $request->validate([
            'username' =>'required|string',
            'password' => 'required|string',
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|string',
            'telephone'=>'required|string',
            'genre'=>'required|string',
            'user_fk'=>'required|int'
        ]);
        $user = new User();
        $user->username = $field['username'];
        $user->password =  Hash::make($field['password']);
        $user->save();
        $token = $user->createToken('token')->plainTextToken;
        Client::create([
            'nom'=>$field['nom'],
            'prenom'=>$field['prenom'],
            'email'=>$field['email'],
            'telephone' =>$field['telephone'],
            'genre'=>$field['genre'],
            'user_fk'=>$field['user_fk'],
        ]);
        return response()->json([
           'message' =>'register success',
            'user' => $user,
            'token'=> $token
        ],200);
    }
}
