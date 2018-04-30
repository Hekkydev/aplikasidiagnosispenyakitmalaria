<?php

namespace App\Http\Controllers;

use App\Penyebab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PenyebabController extends Controller
{

    public function __construct()
    {
        $this->menus = $this->menus();
    }

    public function index()
    {
        $judul = 'Daftar Penyebab';
        $menus = $this->menus;
        $penyebab = Penyebab::all();
        return view('master_penyebab.page', compact('menus', 'judul', 'penyebab'));
    }

    function add()
    {
        $judul = 'Daftar Penyebab';
        $menus = $this->menus;
        return view('master_penyebab.add',compact('menus','judul'));
    }

    function add_proses(Request $e)
    {
        $rules = [
                'kode_penyebab'=>'required',
                'nama_penyebab'=>'required'
        ];
        $validator = Validator::make($e->all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('message','Error insert data');
            return Redirect::to('backend/penyebab/add');
        }else{

            $insert = new Penyebab();
            $insert->kode_penyebab = $e->kode_penyebab;
            $insert->nama_penyebab = $e->nama_penyebab;
            $insert->save();

            Session::flash('message', 'Successfully created data!');
            return Redirect::to('backend/penyebab');

        }
    }

    function edit($id)
    {

        $judul = 'Daftar Penyabab';
        $menus = $this->menus;
        $penyebab  = Penyebab::find($id);
        return view('master_penyebab.edit',compact('menus','judul','penyebab'));
    }

    function update_proses(Request $e)
    {

        $id = $e->id;
        $rules = [
            'id'=>'required',
            'kode_penyebab'=>'required',
            'nama_penyebab'=>'required'
        ];
        $validator = Validator::make($e->all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('message','Error update data');
            return Redirect::to('backend/penyebab/'.$id.'/edit');
        }else{

            $insert =  Penyebab::find($id);
            $insert->kode_penyebab = $e->kode_penyebab;
            $insert->nama_penyebab = $e->nama_penyebab;
            $insert->save();

            Session::flash('message', 'Successfully update data!');
            return Redirect::to('backend/penyebab');

        }

    }

    function  delete($id)
    {
        $nerd = Penyebab::find($id);
        $nerd->delete();

        Session::flash('message', 'Successfully delete data!');
        return Redirect::to('backend/penyebab');
    }
}
