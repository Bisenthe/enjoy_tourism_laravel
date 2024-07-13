<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ClientController;

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
        $msg = "";
        $data["client"] ="User System";
        $field = $request->validate([
            'username' =>'required|string',
            'password' => 'required|string',
            'email'=>'string',
            'is_client'=>'required|bool'
        ]);
        $user = new User();
        $user->username = $field['username'];
        $user->password =  Hash::make($field['password']);
        $user->email = $field['email']??"";
        $user->is_client = $field['is_client'];
        $user->save();

        $token = $user->createToken('token')->plainTextToken;
        if($field['is_client']){
            $client = new ClientController();
            $data = $client->store($request);

        }

        return response()->json([
           'message' =>'register success',
           'data' => $data['client'],
            'user' => $user,
            'token'=> $token
        ],200);
    }
    public function index(){
        $user = User::all();
        return response()->json([
             'user' => $user
         ],200);
    }
}
