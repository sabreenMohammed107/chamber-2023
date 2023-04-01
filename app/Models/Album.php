<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'ar_name', 'en_name', 'album_date','order', 'active',
    ];

    public function gallery()
    {
        return $this->hasMany('App\Models\Album_gallery');
    }
}
