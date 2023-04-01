<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $fillable = [
        'ar_title', 'en_title', 'news_date','ar_text', 'en_text', 'searchType','home_order', 'active',
    ];
  
   
    public function gallery()
    {
        return $this->hasMany('App\Models\News_gallery');
    }


    public function relatednews()
    {
        return $this->hasMany('App\Models\Related_news','related_news_id');
    }
}
