<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announce_file extends Model
{
    protected $fillable = ['path','name','language_id','announce_id'];
}
