<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Woman_activity extends Model
{
    protected $fillable = [
        'ar_title', 'en_title', 'activity_date','ar_text', 'en_text', 'searchType', 'active',
    ];
    public function gallery()
    {
        return $this->hasMany('App\Models\Wactivity_gallery','activity_id','id');
    }


    public function relatednews()
    {
        return $this->hasMany('App\Models\Woman_activity','related_activity_id');
    }
}
