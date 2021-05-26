<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use File;
use App\Http\Requests;
use Authenticate;
use DB;
use PDF;
use App\pengguna;
use App\dumas;
use App\verifikasi;

class CoPimpinan extends Controller
{
    public function home()
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            return view('/pimpinan/home');
        }

    }
}
