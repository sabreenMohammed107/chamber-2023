<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'image','ar_name','en_name','ar_text','en_text','order'
    ];
}
