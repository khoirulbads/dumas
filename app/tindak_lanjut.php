<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class tindak_lanjut extends Model
{
    protected $table = 'tindak_lanjut';
    protected $fillable = [
        'TLAN_ID', 'DUMAS_ID','STATUS','TGL','KET'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('tindak_lanjut')->orderBy('TLAN_ID','DESC')->take(1)->get();
    }
}
