<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = [
            ['name' => 'Jeitto', 'description' => 'O Jeitto é o aplicativo de crédito para compras e pagamentos.', 'approval_percentage' => 60.00],
            ['name' => 'Serasa', 'description' => 'A Serasa é o aplicativo de crédito para compras e pagamentos.', 'approval_percentage' => 75.50]
        ];

        foreach($partners as $partner){
            Partner::create($partner);
        }
    }
}
