<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trained_company extends Model
{
    protected $fillable = [
        'ar_name', 'en_name', 'year_from','year_to','active'
    ];
}
