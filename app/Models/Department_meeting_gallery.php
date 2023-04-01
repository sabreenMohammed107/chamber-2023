<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department_meeting_gallery extends Model
{
    protected $fillable = ['image','vedio','order','department_meeting_id','active'];
}
