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
            return redirect('/login')->with('errlog','.');
        }else{

            return view('/pimpinan/home');
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
        $idt = tindak_lanjut::getId();
        $ses = Session::get('akun');
        $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c, tindak_lanjut d where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = ''");
        return view('/pimpinan/dt_dumas',['data'=>$data,'idt'=>$idt]);
    }

    public function addstdumas(Request $request)
    {
        $it = $request->idt;
        $id = $request->idd;
        $st = $request->sta;
        $kt = $request->ket;
        $tg = date('Y-m-d H:i:s');


       $data = new tindak_lanjut();
        if($id == null){
            $data->TLAN_ID = 1;
        }else{
            $data->TLAN_ID = $id;
        }
        $data->DUMAS_ID = $id;
        $data->STATUS = $st;
        $data->KET = $kt;
        $data->TGL = $tg;
        $data->save();

        return redirect('odatadumas')->with('addpeng','.');
    }


    public function dtaproses()
    {   
        $ses = Session::get('akun');
        $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c, tindak_lanjut d where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses'");
        return view('/pimpinan/pr_dumas',['data'=>$data]);
    }
}
