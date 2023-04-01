<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exporter_encyclopedia extends Model
{
    protected $fillable = [
        'ar_agreement', 'en_agreement', 'en_file','ar_file','active','exporter_type_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Exporter_type','exporter_type_id');

    }
}
