<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class sosmed extends Model
{
    protected $table = 'sosmed';
    protected $fillable = [
        'ID_SOSMED', 'LOGO','LINK'
    ];

    public $timestamps = false;
    
    public static function getId(){
        return $getId = DB::table('sosmed')->orderBy('ID_SOSMED','DESC')->take(1)->get();
    }
}
