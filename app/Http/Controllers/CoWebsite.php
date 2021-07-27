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
use App\visitor;
use App\pengguna;
use App\dumas;
use App\verifikasi;
use App\saran;

class CoWebsite extends Controller
{
    public function home()
    {   
        
        $ip = $_SERVER['REMOTE_ADDR'];

        $cek = DB::SELECT("SELECT * FROM visitor_counter WHERE IP = '$ip'");

        if ($cek != null) {
            
        }else{
            $save = DB::table('visitor_counter')->insert(['IP' => $ip]);  
            
        }

        $visit = DB::SELECT("SELECT COUNT(*) as jum FROM visitor_counter");
        $pelapor = DB::SELECT("SELECT  COUNT(DISTINCT a.PENG_ID) as jum FROM pengguna a, dumas b WHERE a.PENG_ID = b.PENG_ID AND a.LEVEL = 'Pengunjung'");
        $masuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, verifikasi b WHERE a.DUMAS_ID = b.DUMAS_ID AND HAPUS = 0");
        $tindak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, tindak_lanjut b WHERE a.DUMAS_ID = b.DUMAS_ID AND b.STATUS = 'selesai'");
        return view('/website/index',['visit'=>$visit,'pel'=>$pelapor,'masuk'=>$masuk,'tindak'=>$tindak]);
    }


    
    public function tentang()
    {
            return view('/website/tentang');
    }
    
    public function kontak()
    {
        $ids = saran::getId();

        return view('/website/kontak',['ids'=>$ids]);
    }
    
    public function addsaran(Request $req)
    {   

        $id = $req->ids;
        $na = $req->nama;
        $em = $req->email;
        $is = $req->isi;
        $tg = date('Y-m-d');

       $data = new saran();
        if($id == null){
            $data->SARAN_ID = 1;
        }else{
            $data->SARAN_ID = $id;
        }
        $data->NAMA = $na;
        $data->EMAIL = $em;
        $data->ISI = $is;
        $data->TGL = $tg;
        $data->save();


        return redirect("/kontak");
    }

}
