<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customer = new Customer([
            'name' => 'João da Silva',
            'profession' => 'Engenheiro',
            'cpf' => '123.456.789-10',
        ]);
        $customer->save();
    }
}
