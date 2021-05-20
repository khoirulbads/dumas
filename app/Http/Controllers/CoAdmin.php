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
               if($key->foto == 'defaultprofile.png'){

                }else{
                    $image_path = "assets/foto/$key->foto";
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
    	$data = DB::SELECT("select*from dumas a, pengguna b where a.PENG_ID = b.PENG_ID");
	    return view('/admin/dt_dumas',['data'=>$data,'idd'=>$idd]);
    }

    public function adddumas(Request $request)
    {
        $id = $request->idd;
        $na = $request->judul;
        $em = $request->isi;
        $us = $request->kat;
        $pa = $request->lokasi;
        $le = $request->lamp;

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
}
