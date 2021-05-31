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
use App\tindak_lanjut;
use App\respon;

class CoPengunjung extends Controller
{
    public function home()
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            return view('/pengunjung/home');
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
        $idd = dumas::getId();
        $idv = verifikasi::getId();
        $ses = Session::get('akun');
        $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.PENG_ID = '$ses'");
        return view('/pengunjung/dt_dumas',['data'=>$data,'idd'=>$idd,'idv'=>$idv]);
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
        if($iv == null){
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

        return redirect('pdatadumas')->with('addpeng','.');
    }

    public function detdumas($id)
    {   
        $data = DB::SELECT("select*from dumas a, pengguna b where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = '$id'");
        $ver = DB::SELECT("select*from verifikasi where DUMAS_ID = '$id'");
        $tln = DB::SELECT("select*from tindak_lanjut where DUMAS_ID = '$id'");
        $res = DB::SELECT("select*from respon where DUMAS_ID = '$id'");
        return view('/pengunjung/det_dumas',['data'=>$data,'ver'=>$ver,'tln'=>$tln,'res'=>$res]);
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

        return redirect('pdatadumas')->with('delpeng','.');
    }

    public function dtaresdumas()
    {   
        $idd = dumas::getId();
        $idr = respon::getId();
        $ses = Session::get('akun');
        $data = DB::SELECT("select*from dumas a, pengguna b, tindak_lanjut c where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'selesai' and a.PENG_ID = '$ses'");
        return view('/pengunjung/res_dumas',['data'=>$data,'idd'=>$idd,'idr'=>$idr]);
    }

    public function resdumas(Request $request)
    {
        $it = $request->idt;
        $id = $request->idd;
        $ip = $request->idp;
        $kt = $request->ket;
        $tg = date('Y-m-d H:i:s');


       $data = new respon();
        if($id == null){
            $data->RESPON_ID = 1;
        }else{
            $data->RESPON_ID = $id;
        }
        $data->DUMAS_ID = $id;
        $data->PENG_ID = $ip;
        $data->ISI = $kt;
        $data->TGL = $tg;
        $data->save();

        return redirect('pdatadumas')->with('addpeng','.');
    }

    public function dtastat()
    {   
        $ses = Session::get('akun');
        $ver = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM verifikasi a, dumas b WHERE a.DUMAS_ID = b.DUMAS_ID AND b.PENG_ID = '$ses'");
        $tln = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM tindak_lanjut a, dumas b WHERE a.DUMAS_ID = b.DUMAS_ID AND b.PENG_ID = '$ses' ");
        $sel = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM respon a, dumas b WHERE a.DUMAS_ID = b.DUMAS_ID AND b.PENG_ID = '$ses'");
        return view('/admin/dt_stat',['ver'=>$ver,'tln'=>$tln,'sel'=>$sel]);
    }
}
