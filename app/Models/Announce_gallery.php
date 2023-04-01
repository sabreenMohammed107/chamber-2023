<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announce_gallery extends Model
{
    protected $fillable = ['image','vedio','order','announce_id','home_order','active'];
    
    
    public function announce()
    {
        return $this->belongsTo('App\Models\Announcement','announce_id');

    }
}
