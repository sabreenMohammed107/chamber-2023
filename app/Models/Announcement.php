<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Announcement extends Model
  {
   
    protected $fillable = [
      'ar_title', 'en_title', 'announce_date','ar_text', 'en_text', 'searchType','home_order', 'active',
  ];
   
    public function gallery()
    {
        return $this->hasMany('App\Models\Announce_gallery','announce_id','id');
    }
    public function relatedannounce()
    {
        return $this->hasMany('App\Models\Related_announce','related_announce_id');
    }

    
}
