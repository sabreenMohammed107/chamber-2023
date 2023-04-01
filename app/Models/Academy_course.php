<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academy_course extends Model
{
    protected $fillable = [
        'en_name', 'ar_name', 'image','ar_description', 'en_description', 'course_hourse', 'course_cost','content','audience','vip','active'
    ];
}
