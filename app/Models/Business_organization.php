<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_organization extends Model
{
    protected $fillable = [
        'ar_name','en_name','phone','email','website','en_address','ar_address','bussiness_type_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Business_type','bussiness_type_id');

    }
}
