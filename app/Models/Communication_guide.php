<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Communication_guide extends Model
{
    protected $fillable = [
        'ar_name','en_name','phone','fax','email','website','en_address','ar_address',
    ];
}
