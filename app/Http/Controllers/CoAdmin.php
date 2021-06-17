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

class CoAdmin extends Controller
{
    public function home()
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            return view('/admin/home');
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

    

    public function dtapeng()
    {   
        $idp = pengguna::getId();
        $data = DB::SELECT("select*from pengguna");
        return view('/admin/dt_pengguna',['data'=>$data,'idp'=>$idp]);
    }

    public function addpeng(Request $request)
    {
        $id = $request->idp;
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $le = $request->level;
        $fo = $request->foto;

        if($fo == null){
            $foto = 'defaultprofile.png';
        }else{
            $foto = $fo->getClientOriginalName();
            $request->file('foto')->move("assets/foto/", $foto);
        }

       $data = new pengguna();
        if($id == null){
            $data->PENG_ID = 1;
        }else{
            $data->PENG_ID = $id;
        }
        $data->NAMA = ucfirst($na);
        $data->EMAIL = $em;
        $data->USERNAME = $us;
        $data->PASSWORD = $pa;
        $data->LEVEL = $le;
        $data->FOTO = $foto;
        $data->save();

        return redirect('datapengguna')->with('addpeng','.');
    }

    public function updpeng(Request $request,$id)
    {
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $le = $request->level;

        if($request->file('foto')==null){

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le]);
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

            $data = DB::table('pengguna')->where('PENG_ID',$id)->update(['NAMA'=>ucfirst($na),'EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'LEVEL'=>$le,'FOTO'=>"$m_path"]);      
        }
        
        return redirect('datapengguna')->with('updpeng','.');
    }

    public function delpeng($id)
    {
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
        DB::table('pengguna')->where('PENG_ID',$id)->delete();

        return redirect('datapengguna')->with('delpeng','.');
    }



    public function dtadumas()
    {   
        $idd = dumas::getId();
        $idv = verifikasi::getId();
        $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi'");
        return view('/admin/dt_dumas',['data'=>$data,'idd'=>$idd,'idv'=>$idv]);
    }

    public function adddumas(Request $request)
    {
        $id = $request->idd;
        $iv = $request->idv;
        $ju = $request->judul;
        $is = $request->isi;
        $tg = date('Y-m-d H:i:s');
        $ka = $request->kat;
        $lo = $request->lokasi;
        $ak = $request->akun;
        
        if($request->file('lamp') == null){
            $la = 'default.png';
        }else{
            $exp  = $request->file('lamp')->extension();
            $la = $request->akun.'.'.$exp; 
            $request->file('lamp')->move("assets/lampiran/", $la);
        }

        $data = new dumas();
        if($id == null){
            $data->DUMAS_ID = 1;
        }else{
            $data->DUMAS_ID = $id;
        }
        $data->JUDUL = ucfirst($ju);
        $data->ISI = $is;
        $data->TGL = $tg;
        $data->LOKASI = $lo;
        $data->KATEGORI = $ka;
        $data->LAMPIRAN = $la;
        $data->PENG_ID = $ak;
        $data->save();

        $data = new verifikasi();
        if($id == null){
            $data->VER_ID = 1;
        }else{
            $data->VER_ID = $iv;
        }
        if($id == null){
            $data->DUMAS_ID = 1;
        }else{
            $data->DUMAS_ID = $id;
        }
        $data->STATUS = 'belum verifikasi';
        $data->TGL = $tg;
        $data->save();

        return redirect('datadumas')->with('addpeng','.');
    }

    public function updstdumas(Request $request,$id)
    {
        $st = $request->stat;
        $kt = $request->ket;
        $tg = date('Y-m-d H:i:s');

        $data = DB::table('verifikasi')->where('DUMAS_ID',$id)->update(['STATUS'=>$st,'TGL'=>$tg,'KET'=>$kt]);
       
        return redirect()->back()->with('addpeng','.');
    }

    public function upddumas(Request $request,$id)
    {
        $ju = $request->judul;
        $is = $request->isi;
        $ka = $request->kat;
        $lo = $request->lokasi;
        $ak = $request->akun;

        if($request->file('lamp') == null){

            $data = DB::table('dumas')->where('DUMAS_ID',$id)->update(['JUDUL'=>ucfirst($ju),'ISI'=>$is,'KATEGORI'=>$ka,'LOKASI'=>$lo]);
        }else{

            $gam = DB::SELECT("select*from dumas where DUMAS_ID = '$id'");
            foreach ($gam as $key) {
               if($key->LAMPIRAN == 'default.png'){

                }else{
                    $image_path = "assets/lampiran/$key->LAMPIRAN";
                    if(File::exists($image_path)) {
                    File::delete($image_path);
                    }
                }
            }

                $exp  = $request->file('lamp')->extension();
                $la = $request->akun.'.'.$exp; 
                $request->file('lamp')->move("assets/lampiran/", $la);

            $data = DB::table('dumas')->where('DUMAS_ID',$id)->update(['JUDUL'=>ucfirst($ju),'ISI'=>$is,'KATEGORI'=>$ka,'LOKASI'=>$lo,'LAMPIRAN'=>"$la"]);      
        }
        
        return redirect()->back()->with('addpeng','.');
    }

    public function deldumas($id)
    {
        $gam = DB::SELECT("select*from dumas where DUMAS_ID = '$id'");
        foreach ($gam as $key) {
               if($key->LAMPIRAN == 'default.png'){

                }else{
                    $image_path = "assets/lampiran/$key->LAMPIRAN";
                    if(File::exists($image_path)) {
                    File::delete($image_path);
                    }
                }
            }
        DB::table('dumas')->where('DUMAS_ID',$id)->delete();

        return redirect('datadumas')->with('delpeng','.');
    }

    public function dtaverdumas()
    {   
        $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi'");
        return view('/admin/dt_verdumas',['data'=>$data]);
    }


    public function dtastat()
    {   
        $ver = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM verifikasi where STATUS = 'telah verifikasi'");
        $tln = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM tindak_lanjut");
        $sel = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM respon");
        return view('/admin/dt_stat',['ver'=>$ver,'tln'=>$tln,'sel'=>$sel]);
    }
}
