<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamber_ads extends Model
{
    protected $fillable = [
        'ads_no', 'image', 'url','active'
    ];
}
