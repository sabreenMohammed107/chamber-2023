<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Department_board_director extends Model
{
    protected $fillable = [
        'manager_en_name', 'manager_ar_name', 'from_date','to_date','current','department_id'
    ];
}
