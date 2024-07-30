<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $table = 'personal_info';

    protected $fillable = [
        'surname',
        'firstname',
        'middlename',
        'extname',
        'dob',
        'placeOfBirth',
        'sex',
        'citizenship',
        'dualType',
        'dualCountry',
        'height',
        'weight',
        'bloodType',
        'civilStatus',
        'email',
    ];
}
