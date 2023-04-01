<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $fillable = [
        'ar_name','en_name','phone','email','website','en_address','ar_address','manager_ar_name','manager_en_name'
        ,'order','image','ministry_type_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Ministry_type','ministry_type_id');

    }
}
