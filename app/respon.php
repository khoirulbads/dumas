<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class respon extends Model
{
    protected $table = 'respon';
    protected $fillable = [
        'RESPON_ID', 'PENG_ID','DUMAS_ID','ISI', 'TGL'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('respon')->orderBy('RESPON_ID','DESC')->take(1)->get();
    }
}
