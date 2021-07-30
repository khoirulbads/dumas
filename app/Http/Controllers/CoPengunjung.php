<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use File;
use App\Http\Requests;
// use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Mail;
// use App\Http\Controllers\MalasngodingEmail;
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

            $ses = Session::get('akun');
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' AND b.PENG_ID = '$ses' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' AND b.PENG_ID = '$ses' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' AND b.PENG_ID = '$ses' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' AND b.PENG_ID = '$ses' and a.HAPUS = 0");

            return view('/pengunjung/home',['jmasuk'=>$jmasuk,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
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

            $idd = dumas::getId();
            $idv = verifikasi::getId();
            $ses = Session::get('akun');
            $kat = DB::SELECT("select*from kategori");
            $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.PENG_ID = '$ses' and a.HAPUS = 0");
            return view('/pengunjung/dt_dumas',['idd'=>$idd,'idv'=>$idv,'data'=>$data,'kat'=>$kat]);

        }
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
        $data->HAPUS = '0';
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


        $dumas = DB::SELECT("select*from dumas a, pengguna b where a.PENG_ID = b.PENG_ID and a.PENG_ID = '$ak'");

        foreach($dumas as $dum){
            $data = array(

                'nama' => $dum->NAMA,
                'email' => $dum->EMAIL,
                'judul' => $dum->JUDUL,
                'lokasi' => $dum->LOKASI,
                'tanggal' => $dum->TGL,
                'kat' => $dum->KATEGORI,
                'isi' => $dum->ISI,
            );
        }


        \Mail::send('email.emailku',$data, function($message) use ($data)
        {
            $message->from($data['email']);
            $message->to('bengkulupengawasan@gmail.com')->subject('Pengaduan Masyarakat');
        });

        return redirect('pdatadumas')->with('addpeng','.');
    }

    public function detdumas($id)
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $data = DB::SELECT("select*from dumas a, pengguna b where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = '$id'");
            $ver = DB::SELECT("select*from verifikasi where DUMAS_ID = '$id'");
            $tln = DB::SELECT("select*from tindak_lanjut where DUMAS_ID = '$id'");
            $res = DB::SELECT("select*from respon where DUMAS_ID = '$id'");
            return view('/pengunjung/det_dumas',['data'=>$data,'ver'=>$ver,'tln'=>$tln,'res'=>$res]);

        }
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
        // DB::table('dumas')->where('DUMAS_ID',$id)->delete();
            $data = DB::table('dumas')->where('DUMAS_ID',$id)->update(['HAPUS'=>'1']);

        return redirect('pdatadumas')->with('delpeng','.');
    }

    public function dtaresdumas()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $idd = dumas::getId();
            $idr = respon::getId();
            $ses = Session::get('akun');
            $data = DB::SELECT("select*from dumas a, pengguna b, tindak_lanjut c where NOT EXISTS (SELECT * FROM respon WHERE a.DUMAS_ID = respon.DUMAS_ID) and a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'selesai' and a.PENG_ID = '$ses' and a.HAPUS = 0");
            return view('/pengunjung/res_dumas',['data'=>$data,'idd'=>$idd,'idr'=>$idr]);

        }
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


        $cek = DB::SELECT("SELECT * , c.ISI as KET FROM pengguna a, dumas b, respon c WHERE a.PENG_ID = b.PENG_ID and b.DUMAS_ID = c.DUMAS_ID and b.DUMAS_ID = $id");

        foreach($cek as $dum){
            $data = array(
                'perihal' => 'Pengaduan telah direspon',
                'nama' => $dum->NAMA,
                'email' => $dum->EMAIL,
                'judul' => $dum->JUDUL,
                'isi' => $dum->ISI,
                'kat' => $dum->KATEGORI,
                'lokasi' => $dum->LOKASI,
                'ket' => $dum->KET,
                'hal' => 'direspon',
                'tanggal' => date('Y-m-d H:i:s'),
            );
        }

        \Mail::send('email.email_respon',$data, function($message) use ($data)
            {
                $message->from($data['nama']);
                $message->to('bengkulupengawasan@gmail.com')->subject('Pengaduan Masyarakat');
            }
        );

        return redirect('pdatadumas')->with('addpeng','.');
    }

    public function dtastat()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{
            
            $ses = Session::get('akun');
            $bel = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM verifikasi a, dumas b WHERE a.DUMAS_ID = b.DUMAS_ID AND a.STATUS = 'belum verifikasi' AND b.PENG_ID = '$ses' and b.HAPUS = 0 ");
            $ver = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM verifikasi a, dumas b WHERE a.DUMAS_ID = b.DUMAS_ID AND a.STATUS = 'telah verifikasi' AND  b.PENG_ID = '$ses' and b.HAPUS = 0 ");
            $tln = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM tindak_lanjut a, dumas b WHERE a.DUMAS_ID = b.DUMAS_ID AND b.PENG_ID = '$ses' and b.HAPUS = 0 ");
            $sel = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM respon a, dumas b WHERE a.DUMAS_ID = b.DUMAS_ID AND b.PENG_ID = '$ses' and b.HAPUS = 0");
            return view('/pengunjung/dt_stat',['bel'=>$bel,'ver'=>$ver,'tln'=>$tln,'sel'=>$sel]);

        }
    }
}
