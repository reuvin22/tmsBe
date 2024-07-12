<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    use HasFactory;

    protected $fillable = [
        'siteId',
        'site_name',
        'location',
        'staff_assigned'
    ];
}
