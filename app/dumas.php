<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class dumas extends Model
{
    protected $table = 'dumas';
    protected $fillable = [
        'DUMAS_ID', 'PENG_ID','JUDUL','ISI', 'TGL','KATEGORI','LAMPIRAN'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('dumas')->orderBy('DUMAS_ID','DESC')->take(1)->get();
    }
}
