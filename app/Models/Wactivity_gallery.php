<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wactivity_gallery extends Model
{
    protected $fillable = ['image','vedio','order','activity_id','active'];
    public function news()
    {
        return $this->belongsTo('App\Models\Woman_activity','activity_id');

    }
}
