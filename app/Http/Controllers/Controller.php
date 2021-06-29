<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use File;
use Illuminate\Http\Request;
use App\Http\Requests;
use Authenticate;
use DB;
use App\pengguna;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function login()
    {   
        $idp = pengguna::getId();

        return view('/login',['idp'=>$idp]);
    }

    public function register(Request $request)
    {
        $id = $request->idp;
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $fo = $request->foto;

        if($fo == null){
            $foto = 'defaultprofile.png';
        }else{
            $foto = $fo->getClientOriginalName();
            $request->file('foto')->move("assets/foto/", $foto);
        }

       $data = new pengguna();
            $data->PENG_ID = $id;
            $data->NAMA = ucfirst($na);
            $data->EMAIL = $em;
            $data->USERNAME = $us;
            $data->PASSWORD = $pa;
            $data->LEVEL = 'Admin';
            $data->FOTO = $foto;
            $data->save();

        return redirect('/')->with('addpeng','.');

    }

    public function regispeng(Request $request)
    {
        $id = $request->idp;
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $fo = $request->foto;

        if($fo == null){
            $foto = 'defaultprofile.png';
        }else{
            $foto = $fo->getClientOriginalName();
            $request->file('foto')->move("assets/foto/", $foto);
        }

       $data = new pengguna();
            $data->PENG_ID = $id;
            $data->NAMA = ucfirst($na);
            $data->EMAIL = $em;
            $data->USERNAME = $us;
            $data->PASSWORD = $pa;
            $data->LEVEL = 'Pengunjung';
            $data->FOTO = $foto;
            $data->save();

        return redirect('/')->with('addpeng','.');

    }

    public function actlog(Request $request){
        $username = $request->user;
        $password = $request->pass;
        
        Session::flush();
        $data = DB::table('pengguna')->where([['USERNAME',$username],['PASSWORD',$password]])->get();
        foreach ($data as $key) {
            $nama = $key->USERNAME;
            $level = $key->LEVEL;
        };

        if (count($data) == 0){
            return redirect('/auth')->with('gagal','.');
        }else{

	        if($level == 'Pimpinan') {
	        	$na = DB::SELECT("select*from pengguna where USERNAME like '$username'");
	        	foreach ($na as $nam) {
                    Session::put('akun',$nam->PENG_ID);
	        		Session::put('nama',$username);
                    Session::put('nam',$nam->NAMA);
                    Session::put('email',$nam->EMAIL);
	        		Session::put('level',$nam->LEVEL);
                    Session::put('foto',$nam->FOTO);
	        	}

	            return redirect('/pimpinan');
	        }
	        else if($level == 'Admin') {

                // $na = DB::SELECT("select*from pengguna a, mhs b where a.USER_ID = b.USER_ID and a.USERNAME like '$username'");
                $na = DB::SELECT("select*from pengguna where USERNAME like '$username'");
	        	foreach ($na as $nam) {
	        		Session::put('akun',$nam->PENG_ID);
                    Session::put('nama',$username);
                    Session::put('nam',$nam->NAMA);
                    Session::put('email',$nam->EMAIL);
	        		Session::put('level',$nam->LEVEL);
                    Session::put('foto',$nam->FOTO);
                }

                return redirect('/admin');

	        }else if($level == 'Pengunjung') {

                // $na = DB::SELECT("select*from pengguna a, mhs b where a.USER_ID = b.USER_ID and a.USERNAME like '$username'");
                $na = DB::SELECT("select*from pengguna where USERNAME like '$username'");
	        	foreach ($na as $nam) {
                    Session::put('akun',$nam->PENG_ID);
	        		Session::put('nama',$username);
                    Session::put('nam',$nam->NAMA);
                    Session::put('email',$nam->EMAIL);
	        		Session::put('level',$nam->LEVEL);
                    Session::put('foto',$nam->FOTO);
                }

                return redirect('/pengunjung');

	        }
			else {

            return redirect('/auth')->with('error','.');
        	}
	    }

    }

    public function logout(){

        Session::flush();
        return redirect('/');
    }

}
