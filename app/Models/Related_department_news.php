<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Related_department_news extends Model
{
    protected $fillable = [
        'department_news_id','related_department_news_id'
    ];
    public function relatednews()
    {
        return $this->belongsTo('App\Models\Department_news','related_department_news_id');
    }
}
