<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album_gallery extends Model
{
    protected $fillable = [
        'image', 'vedio', 'order','album_id', 'active',
    ];
    public function albums()
    {
        return $this->belongsTo('App\Models\Album','album_id');

    }
}
