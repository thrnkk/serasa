<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Client;

class AuthenticationTest extends TestCase
{
    
    use RefreshDatabase;

    public function test_created_user_can_authenticate()
    {

        $client = Client::create(['name' => 'Thomas R Reinke', 
                                  'email' => 'thomas.ricardo.reinke@gmail.com', 
                                  'cpf' => '111.862.369-06', 
                                  'password' => Hash::make('desafioserasa'), 
                                  'api_token' => Str::random(60)]);

        $response = $this->post('/api/auth', ['email' => 'thomas.ricardo.reinke@gmail.com',
                                              'password' => 'desafioserasa']);

        $response->assertStatus(200);
    }

    public function test_not_created_user_can_not_authenticate()
    {

        $response = $this->post('/api/auth', ['email' => 'asdaasdasd@sadadas.com',
                                              'password' => 'asdadadsa']);

        $response->assertStatus(404);
    }

    public function test_created_user_can_not_authenticate_with_wrong_credentials()
    {

        $client = Client::create(['name' => 'Thomas R Reinke', 
                                  'email' => 'thomas.ricardo.reinke@gmail.com', 
                                  'cpf' => '111.862.369-06', 
                                  'password' => Hash::make('desafioserasa'), 
                                  'api_token' => Str::random(60)]);

        $response = $this->post('/api/auth', ['email' => 'thomas.ricardo.reinke@gmail.com',
                                              'password' => 'desafioseras']);

        $response->assertStatus(404);
    }
}
