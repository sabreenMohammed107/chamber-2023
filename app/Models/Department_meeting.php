<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Department_meeting extends Model
{
    protected $fillable = [
        'ar_title', 'en_title', 'meeting_date','ar_text', 'en_text', 'department_id','home_order', 'active','ar_schedule','en_schedule'
    ];
    public function gallery()
    {
        return $this->hasMany('App\Models\Department_meeting_gallery','department_meeting_id');
    }

}
