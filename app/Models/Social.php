<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'facebook_url','twitter_url','linkedin_url','feedsfloor_url','googleplus_url','youtube_url'
    ];
}
