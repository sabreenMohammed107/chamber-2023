<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Department_meeting_file extends Model
{
    protected $fillable = ['path','name','language_id','department_meeting_id'];
}
