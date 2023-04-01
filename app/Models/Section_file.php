<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section_file extends Model
{
    protected $fillable = ['path','name','language_id','section_id'];
}
