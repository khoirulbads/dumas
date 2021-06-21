<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use File;
use App\Http\Requests;
// use Illuminate\Http\RedirectResponsetoast;
use Authenticate;
use DB;
use PDF;
use App\pengguna;
use App\dumas;
use App\verifikasi;

class CoWebsite extends Controller
{
    public function home()
    {
            return view('/website/index');
    }
    
    public function kontak()
    {
            return view('/website/kontak');
    }
    
    public function tentang()
    {
            return view('/website/tentang');
    }

}
