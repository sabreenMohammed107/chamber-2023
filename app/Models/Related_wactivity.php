<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Related_wactivity extends Model
{
    protected $fillable = [
        'activity_id','related_activity_id'
    ];
    public function relatednews()
    {
        return $this->belongsTo('App\Models\Woman_activity','related_activity_id');
    }
}
