<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wactivity_file extends Model
{
    protected $fillable = ['path','name','language_id','activity_id'];
}
