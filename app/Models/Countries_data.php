<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries_data extends Model
{
    protected $fillable = [
        'ar_name', 'en_name','flag', 'en_file','ar_file','region_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Region','region_id');

    }

}
