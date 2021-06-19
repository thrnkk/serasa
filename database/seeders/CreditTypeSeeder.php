<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CreditType;

class CreditTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['type' => 'crédito pessoal', 'description' => 'O valor do empréstimo é depositado na conta corrente.'],
        ];

        foreach($types as $type){
            CreditType::create($type);
        }
    }
}
