<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News_file extends Model
{
    protected $fillable = ['path','name','language_id','news_id'];
}
