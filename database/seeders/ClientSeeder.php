<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$clients = [
            ['name' => 'Thomas R Reinke', 'email' => 'thomas.ricardo.reinke@gmail.com', 'cpf' => '111.862.369-06', 'password' => Hash::make('desafioserasa'), 'api_token' => Str::random(60)]
        ];

        foreach($clients as $client){
            Client::create($client);
        }

    }
}
