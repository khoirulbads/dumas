<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'KAT_ID', 'KATEGORI','HAPUS'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('kategori')->orderBy('KAT_ID','DESC')->take(1)->get();
    }
}
