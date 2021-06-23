<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Client;

class ClientTest extends TestCase
{

    use RefreshDatabase;

    public function test_create_a_user()
    {

        $response = $this->post('/api/client/create', ['name' => 'Thomas R Reinke', 
                                              'email' => 'thomas.ricardo.reinke@gmail.com', 
                                              'cpf' => '111.862.369-06', 
                                              'password' => Hash::make('desafioserasa')]);

        $response->assertStatus(201);
    }

    public function test_can_not_create_a_duplicated_user()
    {

        $response = $this->post('/api/client/create', ['name' => 'Thomas R Reinke', 
                                                       'email' => 'thomas.ricardo.reinke@gmail.com', 
                                                       'cpf' => '111.862.369-06', 
                                                       'password' => Hash::make('desafioserasa')]);

        $response = $this->post('/api/client/create', ['name' => 'Thomas R Reinke', 
                                                       'email' => 'thomas.ricardo.reinke@gmail.com', 
                                                       'cpf' => '111.862.369-06', 
                                                       'password' => Hash::make('desafioserasa')]);

        $response->assertStatus(409);
    }

    public function test_list_client_offers()
    {

        $client = Client::create(['name' => 'Thomas R Reinke', 
                                  'email' => 'thomas.ricardo.reinke@gmail.com', 
                                  'cpf' => '111.862.369-06', 
                                  'password' => Hash::make('desafioserasa'), 
                                  'api_token' => Str::random(60)]);

        $apiToken = $client->api_token;

        $response = $this->withHeaders(['API-Token' => $apiToken])
                         ->get('/api/client/offers');

        $response->assertStatus(200);
    }

    public function test_can_not_list_client_offers_from_client_that_not_exists()
    {

        $response = $this->withHeaders(['API-Token' => 'asdas'])
                         ->get('/api/client/offers');

        $response->assertStatus(401);
    }
}
