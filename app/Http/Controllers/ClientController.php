<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::all();
        return response()->json([
             'user' => $client
         ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =["message"=>"","client"=>""];
        $field = $request->validate([
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'telephone'=>'required|string',
            'genre'=>'required|string',
            'user_fk'=>'required|int',
        ]);
        if($field){
           $client = Client::create([
                'nom'=>$field['nom'],
                'prenom'=>$field['prenom'],
                'telephone' =>$field['telephone'],
                'genre'=>$field['genre'],
                'user_fk'=>$field['user_fk'],
            ]);
            $data["message"]="Success";
            $data["client"]=$client;
        }
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
