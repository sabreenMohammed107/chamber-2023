<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Embassies_consulate extends Model
{
    protected $fillable = [
        'ar_name','en_name','phone','fax','email','website','en_address','ar_address','embassies_type_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Embassies_type','embassies_type_id');

    }
}
