<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_applicant extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile','course_id','notes'
    ];
}
