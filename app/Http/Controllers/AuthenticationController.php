<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{

    protected function authenticate(Request $request) {

    	$email    = $request->input('email');
    	$password = $request->input('password');

    	$client = Client::where('email', $email)->first();

    	if ($client) {
    		if (Hash::check($password, $client->password)) {

	            return response()->json($client, 200);

	        }
    	}
        
        return response()->json(['message' => 'Login Inválido.', 'date' => now()], 404);
    }

}
