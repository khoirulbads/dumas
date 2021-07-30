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
use App\kategori;
use App\dumas;
use App\verifikasi;
use App\tindak_lanjut;
use App\sosmed;
use App\saran;

class CoAdmin extends Controller
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

            return view('/admin/home',['jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
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

    public function edsetting(Request $request)
    {
        $no = $request->nopon;
        $em = $request->email;
        $al = $request->alamat;
        $fo = $request->footer;
        $hu = $request->hubung;
        $vi = $request->video;
        $te = $request->tentang;

        $data = DB::table('setting')->where('SET_ID',1)->update(['NO_PONSEL'=>$no,'EMAIL'=>$em,'ALAMAT'=>$al,'FOOTER'=>$fo,'HUBUNGI'=>$hu,'VIDEO'=>$vi,'TENTANG'=>$te]);
        
        return redirect()->back()->with('addpeng','.');
    }

    

    public function dtasosmed()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $idp = sosmed::getId();
            $data = DB::SELECT("select*from sosmed");
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");
            return view('/admin/dt_sosmed',['idp'=>$idp,'data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);

        }
    }

    public function addsosmed(Request $request)
    {
        $id = $request->idp;
        $li = $request->link;
        $lo = $request->logo;

       $data = new sosmed();
        if($id == null){
            $data->ID_SOSMED = 1;
        }else{
            $data->ID_SOSMED = $id;
        }
        $data->LINK = $li;
        $data->LOGO = $lo;
        $data->save();

        return redirect('datasosmed')->with('addpeng','.');
    }

    public function updsosmed(Request $request,$id)
    {
        $li = $request->link;
        $lo = $request->logo;

        $data = DB::table('sosmed')->where('ID_SOSMED',$id)->update(['LINK'=>$li,'LOGO'=>$lo]);

        
        return redirect('datasosmed')->with('updpeng','.');
    }

    public function delsosmed($id)
    {
        
        DB::table('sosmed')->where('ID_SOSMED',$id)->delete();

        return redirect('datasosmed')->with('delpeng','.');
    }



    public function dtapeng()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $idp = pengguna::getId();
            $data = DB::SELECT("select*from pengguna");
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");
            return view('/admin/dt_pengguna',['idp'=>$idp,'data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);

        }
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


    public function dtakat()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $idk = kategori::getId();
            $data = DB::SELECT("select*from kategori where HAPUS = 0 order by KAT_ID");
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");
            return view('/admin/dt_kategori',['idk'=>$idk,'data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);

        }
    }

    public function addkat(Request $request)
    {
        $id = $request->idk;
        $ka = $request->kat;

        $data = new kategori();
        if($id == null){
            $data->KAT_ID = 1;
        }else{
            $data->KAT_ID = $id;
        }
        $data->KATEGORI = ucfirst($ka);
        $data->HAPUS = '0';
        $data->save();

        return redirect('datakategori')->with('addpeng','.');
    }

    public function updkat(Request $request,$id)
    {
        $ka = $request->kat;

        $data = DB::table('kategori')->where('KAT_ID',$id)->update(['KATEGORI'=>$ka]);
       
        return redirect()->back()->with('addpeng','.');
    }

    public function delkat(Request $request,$id)
    {
        $data = DB::table('kategori')->where('KAT_ID',$id)->update(['HAPUS'=>'1']);
       
        return redirect()->back()->with('addpeng','.');
    }



    public function dtadumas()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $idd = dumas::getId();
            $idv = verifikasi::getId();
            $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");
            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/admin/dt_dumas',['idd'=>$idd,'idv'=>$idv,'data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
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

    public function verifikasidumas(Request $request,$id)
    {
        $st = $request->stat;
        $kt = $request->ket;
        $tg = date('Y-m-d H:i:s');
        $data = DB::table('verifikasi')->where('DUMAS_ID',$id)->update(['STATUS'=>$st,'TGL'=>$tg,'KET'=>$kt]);

        $cek = DB::SELECT("select*from pengguna a, dumas b, verifikasi c where a.PENG_ID = b.PENG_ID and b.DUMAS_ID = c.DUMAS_ID and b.DUMAS_ID = $id");


        foreach($cek as $dum){
            $data = array(
                'perihal' => 'Pengaduan telah diverifikasi',
                'nama' => $dum->NAMA,
                'email' => $dum->EMAIL,
                'judul' => $dum->JUDUL,
                'isi' => $dum->ISI,
                'kat' => $dum->KATEGORI,
                'lokasi' => $dum->LOKASI,
                'ket' => $dum->KET,
                'hal' => 'diverifikasi',
                'tanggal' => date('Y-m-d H:i:s'),
            );
        }


        \Mail::send('email.email_dumas',$data, function($message) use ($data)
            {
                $message->from('noreply@dumas.pkmsukorame.com');
                $message->to($data['email'])->subject('Pengaduan Masyarakat');
            }
        );
        
        return redirect()->back()->with('addpeng','.');
    }

    public function dtaverdumas()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $idt = tindak_lanjut::getId();
            $data = DB::SELECT("SELECT * FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/admin/dt_verdumas',['idt'=>$idt,'data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);

        }
    }

    public function prosesdumas(Request $request)
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


        $cek = DB::SELECT("select*from pengguna a, dumas b, tindak_lanjut c where a.PENG_ID = b.PENG_ID and b.DUMAS_ID = c.DUMAS_ID and b.DUMAS_ID = $id");


        foreach($cek as $dum){
            $data = array(
                'perihal' => 'Pengaduan sedang diproses',
                'nama' => $dum->NAMA,
                'email' => $dum->EMAIL,
                'judul' => $dum->JUDUL,
                'isi' => $dum->ISI,
                'kat' => $dum->KATEGORI,
                'lokasi' => $dum->LOKASI,
                'ket' => $dum->KET,
                'hal' => 'diproses',
                'tanggal' => date('Y-m-d H:i:s'),
            );
        }


        \Mail::send('email.email_dumas',$data, function($message) use ($data)
            {
                $message->from('noreply@dumas.pkmsukorame.com');
                $message->to($data['email'])->subject('Pengaduan Masyarakat');
            }
        );

        return redirect('dataverdumas')->with('addpeng','.');
    }

    public function dtatlkdumas()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $idd = dumas::getId();
            $idv = verifikasi::getId();
            $data = DB::SELECT("select*from dumas a, pengguna b, verifikasi c where a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");
            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/admin/dt_tolak',['idd'=>$idd,'idv'=>$idv,'data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
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

            return view('/admin/dt_produmas',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);

        }
    }

    public function tindakdumas(Request $request,$id)
    {
        $st = $request->stat;
        $kt = $request->ket;
        $tg = date('Y-m-d H:i:s');
    
        $data = DB::table('tindak_lanjut')->where('TLAN_ID',$id)->update(['STATUS'=>$st,'KET'=>$kt,'TGL'=>$tg]);


        $cek = DB::SELECT("select*from pengguna a, dumas b, tindak_lanjut c where a.PENG_ID = b.PENG_ID and b.DUMAS_ID = c.DUMAS_ID and b.DUMAS_ID = $id");

        foreach($cek as $dum){
            $data = array(
                'perihal' => 'Pengaduan telah ditindaklanjut',
                'nama' => $dum->NAMA,
                'email' => $dum->EMAIL,
                'judul' => $dum->JUDUL,
                'isi' => $dum->ISI,
                'kat' => $dum->KATEGORI,
                'lokasi' => $dum->LOKASI,
                'ket' => $dum->KET,
                'hal' => 'ditindaklanjut',
                'tanggal' => date('Y-m-d H:i:s'),
            );
        }

        \Mail::send('email.email_dumas',$data, function($message) use ($data)
            {
                $message->from('noreply@dumas.pkmsukorame.com');
                $message->to($data['email'])->subject('Pengaduan Masyarakat');
            }
        );



        return redirect()->back()->with('addpeng','.');
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

            return view('/admin/dt_tladumas',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);

        }
    }


    public function dtastat()
    {   
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $tdk = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM verifikasi where STATUS = 'tidak verifikasi'");
            $ver = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM verifikasi where STATUS = 'telah verifikasi'");
            $tln = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM tindak_lanjut");
            $sel = DB::SELECT("SELECT DISTINCT COUNT(*) as jum FROM respon");
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");

            return view('/admin/dt_stat',['jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla,'tdk'=>$tdk,'ver'=>$ver,'tln'=>$tln,'sel'=>$sel]);

        }
    }

    public function dtaksa()
    {
        if(Session::get('nama') == null){
            return redirect('/auth')->with('errlog','.');
        }else{

            $data = DB::SELECT("select*from saran");
            $jmasuk = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'belum verifikasi' and a.HAPUS = 0");

            $jtolak = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'tidak verifikasi' and a.HAPUS = 0");

            $jver = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and c.STATUS = 'telah verifikasi' and a.HAPUS = 0 and NOT EXISTS (SELECT * FROM tindak_lanjut WHERE a.DUMAS_ID = tindak_lanjut.DUMAS_ID)");

            $jpro = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'proses' and a.HAPUS = 0");

            $jtla = DB::SELECT("SELECT COUNT(*) as jum FROM dumas a, pengguna b, verifikasi c, tindak_lanjut d WHERE a.PENG_ID = b.PENG_ID and a.DUMAS_ID = c.DUMAS_ID and a.DUMAS_ID = d.DUMAS_ID and c.STATUS = 'telah verifikasi' and d.STATUS = 'selesai' and a.HAPUS = 0");
            return view('/admin/dt_kritik',['data'=>$data,'jmasuk'=>$jmasuk,'jtlk'=>$jtolak,'jver'=>$jver,'jpro'=>$jpro,'jtla'=>$jtla]);
        }

    }
}
