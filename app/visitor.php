<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    protected $table = 'visitor_counter';
    protected $fillable = [
        'VC_ID', 'IP'
    ];

    public $timestamps = false;
   
}
