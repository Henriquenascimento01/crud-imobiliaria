<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'property_photo',
        'property_name',
        'address_street',
        'address_number',
        'address_complement',
        'address_city',
        'address_state',
        'address_zip_code',
        'customer_id',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
