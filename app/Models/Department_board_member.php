<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Department_board_member extends Model
{
    protected $fillable = ['en_name','ar_name','en_position','ar_position',
    'image','position_order','board_directors_id','ar_cv','en_cv'];

}
