<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brother_agreement extends Model
{
    protected $fillable = [
        'agreement_date', 'ar_issuer', 'en_issuer','ar_agreement','en_agreement','en_file','ar_file','active'
    ];
}
