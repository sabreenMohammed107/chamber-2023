<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamber_chance extends Model
{
   //director
   protected $fillable = ['chance_type','chance_date','ar_subject','en_subject','chance_country_id','ar_field'
   ,'en_field','ar_contact','en_contact','order','active'];

   public function country()
   {
       return $this->belongsTo('App\Models\Country','chance_country_id');

   }
}
