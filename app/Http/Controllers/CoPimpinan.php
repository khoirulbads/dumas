<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoPimpinan extends Controller
{
    public function home()
    {
        if(Session::get('nama') == null){
            return redirect('/login')->with('errlog','.');
        }else{

            return view('/admin/home');
        }

    }
}
