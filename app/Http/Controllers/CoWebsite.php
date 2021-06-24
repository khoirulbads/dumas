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
        $countPengunjung = 10;
        $ip_address=$_SERVER['REMOTE_ADDR']; 
        $cek = DB::select("select * from visitor_counter where IP='$ip_address'");
        if ($cek == null) {
                $save = DB::table('visitor_counter')->insert([
                        'IP' => $ip_address
                        ]);                
        }
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
    
    public function addsaran(Request $req)
    {
        $save = DB::table('saran')->insert([
                'EMAIL' => $req->email, 
                'NAMA' => $req->nama,
                'ISI' => $req->isi
                ]);

        return redirect("/kontak");
    }

}
