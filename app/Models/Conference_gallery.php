<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference_gallery extends Model
{
    protected $fillable = ['image','vedio','order','conference_id','home_order','active'];
    
    
    public function announce()
    {
        return $this->belongsTo('App\Models\Conference','conference_id');

    }
}
