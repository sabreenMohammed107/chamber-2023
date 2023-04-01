<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Related_new extends Model
{
    protected $fillable = [
        'news_id','related_news_id'
    ];
    public function announce()
    {
        return $this->belongsTo('App\Models\News');
    }
    public function relatednews()
    {
        return $this->belongsTo('App\Models\News','related_news_id');
    }
}
