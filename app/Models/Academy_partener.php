<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academy_partener extends Model
{
    protected $fillable = [
        'en_name', 'ar_name', 'logo','url', 'active',
    ];
}
