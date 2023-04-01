<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
        'ar_title', 'en_title','conference_date', 'conference_type_id', 'ar_text', 'en_text','home_order', 'active','country_id'
    ];
 
  
    public function gallery()
    {
        return $this->hasMany('App\Models\Conference_gallery','conference_id','id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');

    }

    public function type()
    {
        return $this->belongsTo('App\Models\Conference_type','conference_type_id');

    }
}
