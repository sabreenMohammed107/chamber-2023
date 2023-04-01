<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Department_news extends Model
{

    protected $fillable = [
        'ar_title', 'en_title', 'news_date','ar_text', 'en_text', 'department_id','home_order', 'active'
    ];
    public function gallery()
    {
        return $this->hasMany('App\Models\Department_gallery','department_news_id');
    }
}
