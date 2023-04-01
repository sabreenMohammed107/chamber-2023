<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Related_announce extends Model
{
    protected $fillable = [
        'announce_id','related_announce_id'
    ];
    public function announce()
    {
        return $this->belongsTo('App\Models\Announcement');
    }
    public function relatedannounce()
    {
        return $this->belongsTo('App\Models\Announcement','related_announce_id');
    }
}
