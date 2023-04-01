<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board_member extends Model
{
    //director
    protected $fillable = ['en_name','ar_name','en_position','ar_position','image','person_position','board_directors_id'];
  
    public function director()
    {
        return $this->belongsTo('App\Models\Board_director','board_directors_id');

    }
}
