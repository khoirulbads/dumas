<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class verifikasi extends Model
{
    protected $table = 'verifikasi';
    protected $fillable = [
        'VER_ID', 'DUMAS_ID','STATUS','TGL','KET'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('verifikasi')->orderBy('VER_ID','DESC')->take(1)->get();
    }
}
