<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commerical_topic extends Model
{
    protected $fillable = [
        'ar_text', 'en_text', 'en_file','ar_file','active','commerical_topic_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Commerical_topic_type','commerical_topic_id');

    }
}
