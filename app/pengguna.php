<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class pengguna extends Model
{
    protected $table = 'pengguna';
    protected $fillable = [
        'PENG_ID', 'NAMA','USERNAME','PASSWORD', 'EMAIL','LEVEL'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('pengguna')->orderBy('PENG_ID','DESC')->take(1)->get();
    }
}
