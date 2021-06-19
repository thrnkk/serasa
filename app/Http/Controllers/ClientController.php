<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    protected function offers(Request $request) {

        $token = $request->header("API-Token");
        $client = Client::where("api_token", $token)->with('offers.creditType')->with('offers.partner')->first();

        if(!$client) {
            return response()->json(['message' => 'Cliente não encontrado.', 'date' => now()], 404);
        }

        return response()->json($client, 200);

    }

}
