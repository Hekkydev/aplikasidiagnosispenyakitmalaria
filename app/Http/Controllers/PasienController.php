<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\User;
class PasienController extends Controller
{
    
    public function __construct()
    {
        $this->menus = $this->menus();
    }
    
    public function index()
    {
        $pasien = User::all();
        $menus = $this->menus;
        $judul = "Daftar Pasien";
        return view('master_pasien.page',compact('menus','judul','pasien'));
        
    }

    function info($id)
    {
        $pasien = User::find($id);
        $menus = $this->menus;
        $judul = 'Detail Pasien';
        return view('master_pasien.info',compact('menus','judul','pasien'));
    }


    public function deleted($id)
    {
        $nerd = User::find($id);
        $nerd->delete();

        Session::flash('message', 'Successfully delete data pasien !');
        return Redirect::to('backend/pasien');
    }
}
