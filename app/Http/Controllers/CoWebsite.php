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
        
        $ip_address=$_SERVER['REMOTE_ADDR'];

        $cek = DB::SELECT("SELECT * FROM visitor_counter WHERE IP = ' $ip_address '");

        if ($cek = null) {
            $save = DB::table('visitor_counter')->insert(['IP' => $ip_address ]);                
        }else{

        }

        $visit = DB::SELECT("SELECT COUNT(*) as jum FROM visitor_counter");
        $pelapor = DB::SELECT("SELECT  COUNT(DISTINCT a.PENG_ID) as jum FROM pengguna a, dumas b WHERE a.PENG_ID = b.PENG_ID AND a.LEVEL = 'Pengunjung'");
        $masuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, verifikasi b WHERE a.DUMAS_ID = b.DUMAS_ID AND HAPUS = 0");
        $tindak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, tindak_lanjut b WHERE a.DUMAS_ID = b.DUMAS_ID AND b.STATUS = 'selesai'");
        return view('/website/index',['visit'=>$visit,'pel'=>$pelapor,'masuk'=>$masuk,'tindak'=>$tindak]);
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
