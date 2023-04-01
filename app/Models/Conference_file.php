<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference_file extends Model
{
    protected $fillable = ['path','name','language_id','conference_id'];
}
