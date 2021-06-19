<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
	
    protected function create(Request $request) {

    	$client = $request->all();

    	$client['password'] = Hash::make($client['password']);
    	$client['api_token'] = Str::random(60);

    	try {

			Client::create($client);

    		return response()->json($client, 201);

    	} catch (QueryException $exception) { 

    		return response()->json(['message' => 'Ocorreu um erro ao registrar sua conta.', 'date' => now(), 'error' => $exception], 409);

    	}

    }

}
