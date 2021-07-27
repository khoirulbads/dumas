<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class saran extends Model
{
    protected $table = 'saran';
    protected $fillable = [
        'SARAN_ID', 'NAMA','EMAIL','ISI', 'TGL'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('saran')->orderBy('SARAN_ID','DESC')->take(1)->get();
    }
}
