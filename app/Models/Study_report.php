<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study_report extends Model
{
    protected $fillable = [
        'ar_text', 'en_text', 'en_file','ar_file','active','study_type_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Study_type','study_type_id');

    }
}
