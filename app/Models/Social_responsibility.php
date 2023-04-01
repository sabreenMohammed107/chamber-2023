<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social_responsibility extends Model
{
    protected $fillable = [
        'en_title','ar_title','en_text','ar_text','image','active'
    ];
}
