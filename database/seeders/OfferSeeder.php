<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offers = [
            ['partner_id' => 1, 'credit_type_id' => 1, 'value' =>  3000.00, 'installments' => 6, 'installments_value' => 500.00, 'tax_rate_percent' => 5],
            ['partner_id' => 1, 'credit_type_id' => 1, 'value' =>  5000.00, 'installments' => 6, 'installments_value' => 500.00, 'tax_rate_percent' => 5],
            ['partner_id' => 1, 'credit_type_id' => 1, 'value' => 10000.00, 'installments' => 6, 'installments_value' => 500.00, 'tax_rate_percent' => 5],
            ['partner_id' => 1, 'credit_type_id' => 1, 'value' => 15000.00, 'installments' => 6, 'installments_value' => 500.00, 'tax_rate_percent' => 5],
            ['partner_id' => 1, 'credit_type_id' => 1, 'value' => 30000.00, 'installments' => 6, 'installments_value' => 500.00, 'tax_rate_percent' => 5],

            ['partner_id' => 2, 'credit_type_id' => 1, 'value' => 3000.00, 'installments' =>  3, 'installments_value' => 1000.00, 'tax_rate_percent' =>  5],
            ['partner_id' => 2, 'credit_type_id' => 1, 'value' => 3000.00, 'installments' =>  6, 'installments_value' =>  500.00, 'tax_rate_percent' =>  7],
            ['partner_id' => 2, 'credit_type_id' => 1, 'value' => 3000.00, 'installments' => 12, 'installments_value' =>  250.00, 'tax_rate_percent' => 10],
            ['partner_id' => 2, 'credit_type_id' => 1, 'value' => 3000.00, 'installments' => 18, 'installments_value' =>  150.00, 'tax_rate_percent' => 12],
            ['partner_id' => 2, 'credit_type_id' => 1, 'value' => 3000.00, 'installments' => 24, 'installments_value' =>  125.00, 'tax_rate_percent' => 15],
        ];

        foreach($offers as $offer){
            Offer::create($offer);
        }
    }
}
