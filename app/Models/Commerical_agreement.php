<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commerical_agreement extends Model
{
    protected $fillable = [
        'agreement_date','ar_agreement','en_agreement','en_file','ar_file','active'
    ];
}
