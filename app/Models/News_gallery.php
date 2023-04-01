<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News_gallery extends Model
{
    protected $fillable = ['image','vedio','order','news_id','home_order','active'];
    
    public function news()
    {
        return $this->belongsTo('App\Models\News','news_id');

    }
}
