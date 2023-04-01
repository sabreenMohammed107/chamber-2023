<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Related_conference extends Model
{
    protected $fillable = [
        'conference_id','related_conference_id'
    ];
    public function relatedConferences()
    {
        return $this->belongsTo('App\Models\Conference','related_conference_id');
    }
}
