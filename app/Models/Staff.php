<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staffId',
        'first_name',
        'last_name',
        'middle_name',
        'contact_number',
        'address',
        'email',
        'password',
        'gender',
        'photo'
    ];
}
