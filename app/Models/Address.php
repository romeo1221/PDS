<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address_info';

    protected $fillable = [
        'address_type',
        'country',
        'province',
        'city',
        'barangay',
        'house_number',
        'zip_code',
        'temp_country',
        'temp_province',
        'temp_city',
        'temp_barangay',
        'temp_house_number',
        'temp_zip_code'
    ];
}
