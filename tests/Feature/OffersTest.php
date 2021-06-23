<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Client;
use App\Models\Offer;
use App\Models\CreditType;
use App\Models\Partner;

class OffersTest extends TestCase
{
    
    use RefreshDatabase;

    public function test_list_offers_based_on_installments_and_value()
    {

        $credit = CreditType::create(['type' => 'crédito pessoal', 'description' => 'O valor do empréstimo é depositado na conta corrente.']);
        $partner = Partner::create(['name' => 'Jeitto', 'description' => 'O Jeitto é o aplicativo de crédito para compras e pagamentos.', 'approval_percentage' => 60.00]);

        $offer = Offer::create(['partner_id' => $partner->id, 
                                'credit_type_id' => $credit->id, 
                                'value' =>  3000.00, 
                                'installments' => 6, 
                                'installments_value' => 500.00, 
                                'tax_rate_percent' => 5]);

        $client = Client::create(['name' => 'Thomas R Reinke', 
                                  'email' => 'thomas.ricardo.reinke@gmail.com', 
                                  'cpf' => '111.862.369-06', 
                                  'password' => Hash::make('desafioserasa'), 
                                  'api_token' => Str::random(60)]);

        $apiToken = $client->api_token;

        $response = $this->withHeaders(['API-Token' => $apiToken])
                         ->get('/api/offers?value=3000&installments=6');

        $response->assertStatus(200);
    }

    public function test_list_offers_without_installments_and_value()
    {

        $credit = CreditType::create(['type' => 'crédito pessoal', 'description' => 'O valor do empréstimo é depositado na conta corrente.']);
        $partner = Partner::create(['name' => 'Jeitto', 'description' => 'O Jeitto é o aplicativo de crédito para compras e pagamentos.', 'approval_percentage' => 60.00]);

        $offer = Offer::create(['partner_id' => $partner->id, 
                                'credit_type_id' => $credit->id, 
                                'value' =>  3000.00, 
                                'installments' => 6, 
                                'installments_value' => 500.00, 
                                'tax_rate_percent' => 5]);

        $client = Client::create(['name' => 'Thomas R Reinke', 
                                  'email' => 'thomas.ricardo.reinke@gmail.com', 
                                  'cpf' => '111.862.369-06', 
                                  'password' => Hash::make('desafioserasa'), 
                                  'api_token' => Str::random(60)]);

        $apiToken = $client->api_token;

        $response = $this->withHeaders(['API-Token' => $apiToken])
                         ->get('/api/offers');

        $response->assertStatus(404);
    }

    public function test_list_detailed_offer()
    {

        $credit = CreditType::create(['type' => 'crédito pessoal', 'description' => 'O valor do empréstimo é depositado na conta corrente.']);
        $partner = Partner::create(['name' => 'Jeitto', 'description' => 'O Jeitto é o aplicativo de crédito para compras e pagamentos.', 'approval_percentage' => 60.00]);

        $offer = Offer::create(['partner_id' => $partner->id, 
                                'credit_type_id' => $credit->id, 
                                'value' =>  3000.00, 
                                'installments' => 6, 
                                'installments_value' => 500.00, 
                                'tax_rate_percent' => 5]);

        $client = Client::create(['name' => 'Thomas R Reinke', 
                                  'email' => 'thomas.ricardo.reinke@gmail.com', 
                                  'cpf' => '111.862.369-06', 
                                  'password' => Hash::make('desafioserasa'), 
                                  'api_token' => Str::random(60)]);

        $apiToken = $client->api_token;

        $response = $this->withHeaders(['API-Token' => $apiToken])
                         ->get('/api/offers/' . $offer->id);

        $response->assertStatus(200);
    }

    public function test_accept_a_offer()
    {

        $credit = CreditType::create(['type' => 'crédito pessoal', 'description' => 'O valor do empréstimo é depositado na conta corrente.']);
        $partner = Partner::create(['name' => 'Jeitto', 'description' => 'O Jeitto é o aplicativo de crédito para compras e pagamentos.', 'approval_percentage' => 60.00]);

        $offer = Offer::create(['partner_id' => $partner->id, 
                                'credit_type_id' => $credit->id, 
                                'value' =>  3000.00, 
                                'installments' => 6, 
                                'installments_value' => 500.00, 
                                'tax_rate_percent' => 5]);

        $client = Client::create(['name' => 'Thomas R Reinke', 
                                  'email' => 'thomas.ricardo.reinke@gmail.com', 
                                  'cpf' => '111.862.369-06', 
                                  'password' => Hash::make('desafioserasa'), 
                                  'api_token' => Str::random(60)]);

        $apiToken = $client->api_token;

        $response = $this->withHeaders(['API-Token' => $apiToken])
                         ->post('/api/offers/' . $offer->id . '/accept');

        $response->assertStatus(201);
    }

    public function test_can_not_accept_a_offer_that_does_not_exists()
    {

        $client = Client::create(['name' => 'Thomas R Reinke', 
                                  'email' => 'thomas.ricardo.reinke@gmail.com', 
                                  'cpf' => '111.862.369-06', 
                                  'password' => Hash::make('desafioserasa'), 
                                  'api_token' => Str::random(60)]);

        $apiToken = $client->api_token;

        $response = $this->withHeaders(['API-Token' => $apiToken])
                         ->get('/offers/' . '2342349' . '/accept');

        $response->assertStatus(404);
    }
}
