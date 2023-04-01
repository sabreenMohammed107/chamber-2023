<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decision_low extends Model
{
    protected $fillable = [
        'ar_text', 'en_text', 'en_file','ar_file','active','low_type_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\lows_type','low_type_id');

    }
}
