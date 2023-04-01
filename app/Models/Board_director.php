<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board_director extends Model
{
    protected $fillable = [
        'manager_en_name', 'manager_ar_name', 'from_date','to_date','current'
    ];
    public function ccc()
    {
        return $this->hasMany('App\Models\Board_member','board_directors_id','id');

    }
}
