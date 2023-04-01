<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article_file extends Model
{
    protected $fillable = ['path','name','language_id','article_id'];
    public function gallery()
    {
        return $this->hasMany('App\Models\Article_gallery');
    }
}
