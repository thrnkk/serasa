<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Contract;
use App\Models\Client;
use Illuminate\Database\QueryException;

class OfferController extends Controller
{
    public function __construct(Offer $offers, Contract $contracts){
        $this->offers = $offers;
        $this->contracts = $contracts;
    }

    public function index(Request $request)
    {

    	$value = $request->input('value');
    	$installments = $request->input('installments');

        $offers = $this->offers->where('value', $value)->where('installments', $installments)->with('creditType')->with('partner')->orderBy("id")->get();

        if($offers->isEmpty()) {

        	return response()->json(['message' => 'Nenhum registro não encontrado com esses parâmetros.', 'date' => now()], 404);

        }

        return response()->json($offers, 200);
    }

    public function show($id)
    {
        $offer = $this->offers->with('creditType')->with('partner')->find($id);

        if(!$offer) {
            return response()->json(['message' => 'Registro não encontrado.', 'date' => now()], 404);
        }

        return response()->json($offer, 200);
    }

    public function accept(Request $request, $id)
    {

        $offer = $this->offers->find($id);

        if(!$offer) {
            return response()->json(['message' => 'Oferta não encontrada.', 'date' => now()], 404);
        }

        $token = $request->header("API-Token");
        $client = Client::where("api_token", $token)->first();

        if(!$client) {
            return response()->json(['message' => 'Cliente não encontrado.', 'date' => now()], 401);
        }

        $contract['offer_id'] = $offer->id;
        $contract['client_id'] = $client->id;
        $contract['date'] = now();

        try {

            $contractId = Contract::create($contract)->id;
            $contract = $this->contracts->with('client')->with('offer')->find($contractId);

            return response()->json($contract, 201);

        } catch (QueryException $exception) { 

            return response()->json(['message' => 'Ocorreu um erro ao aceitar este contrato.', 'date' => now(), 'error' => $exception], 409);

        }

    }
}
