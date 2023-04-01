<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Department_register extends Model
{
    protected $fillable = ['name','mobile','email','subject','messege','department_id'];
    public function department()
    {
        return $this->belongsTo('App\Models\Department','department_id');

    }
}
