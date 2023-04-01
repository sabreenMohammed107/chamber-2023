<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academy_data extends Model
{
    protected $fillable = [
        'mangment_phone', 'marketing_phone', 'whatsapp','email'
    ];
}
