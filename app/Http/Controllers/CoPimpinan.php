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
use App\tindak_lanjut;

class CoPimpinan extends Controller
{
    public function home()
    {
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            // $data = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 ");

            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/pimpinan/home',['jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
        }

    }

    public function edpeng(Request $request,$id)
    {
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $le = $request->level;

        if($request->file('foto')==null){

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa]);
        }else{

            $gam = DB::SELECT("select*from pengguna where PENG_ID = '$id'");
            foreach ($gam as $key) {
               if($key->FOTO == 'defaultprofile.png'){

                }else{
                    $image_path = "assets/foto/$key->FOTO";
                    if(File::exists($image_path)) {
                    File::delete($image_path);
                    }
                }
            }

                $photo_path=$request->file('foto');
                $m_path=$photo_path->getClientOriginalName();
                $photo_path->move('assets/foto/',$m_path);

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'FOTO'=>"$m_path"]);      
        }
        return redirect()->back()->with('addpeng','.');
    }

    public function dtadumas()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $data = DB::SELECT("SELECT * FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/pimpinan/dt_dumas',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
        }
    }

    public function dtatlkdumas()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/pimpinan/dt_tolak',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
        }
    }

    public function dtaverdumas()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $data = DB::SELECT("SELECT * FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/pimpinan/dt_verdumas',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);

        }
    }

    public function dtaproses()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c, tindak_lanjut d where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/pimpinan/dt_produmas',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);

        }
    }


    public function dtaselesai()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c, tindak_lanjut d where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/pimpinan/dt_tladumas',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);

        }
    }


    public function dtakatdum()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $data = DB::SELECT("SELECT KAT_ID, KATEGORI FROM  kategori");

            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/pimpinan/dt_katdumas',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
        }
    }

    public function dtadetkat($id)
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $data = DB::SELECT("SELECT * FROM dumas WHERE KATEGORI = '$id'");

            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/pimpinan/dt_detkategori',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
        }
    }


    public function dtastat()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");
            
            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            $tdk = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM verifikasi where STATUS = 'tidak verifikasi'");
            $ver = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM verifikasi where STATUS = 'telah verifikasi'");
            $tln = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM tindak_lanjut");
            $sel = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM respon");
            return view('/pimpinan/dt_stat',['jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla,'tdk'=>$tdk,'ver'=>$ver,'tln'=>$tln,'sel'=>$sel]);

        }
    }

}
