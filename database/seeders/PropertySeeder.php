<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run()
    {   
        $defaultImagePath = 'images/image-default.png';

        $property = new Property([
            'property_photo' => $defaultImagePath,
            'property_name' => 'Casa 01',
            'address_street' => 'Rua A',
            'address_number' => '123',
            'address_complement' => 'Casa 1',
            'address_city' => 'Cidade A',
            'address_state' => 'PR',
            'address_zip_code' => '12.345-678',
            'customer_id' => 1,
        ]);
        $property->save();
    }
}
