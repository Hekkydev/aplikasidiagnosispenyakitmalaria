<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Penyakitmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class PenyakitController extends Controller
{
    function __construct()
    {
        $this->menus = $this->menus();
    }

    function index()
    {
        $menus = $this->menus;
        $judul = "Database Penyakit";
        $penyakit =  Penyakitmodel::all();
        $no = 1;
        return view('master_penyakit.list',compact('menus','judul','judul_desc','penyakit','no'));
    }

    function search()
    {
        $menus = $this->menus;
        $judul = "Telusuri Data Penyakit";
        $judul_desc = "";
        return view('master_penyakit.search',compact('menus','judul','judul_desc'));
    }

    function searchproses(Request $request)
    {
        $Nama_penyakit = isset($request->nama_penyakit) ? $request->nama_penyakit : '';

        $query = DB::table('master_penyakit')->where('nama_penyakit','LIKE', '%' . $Nama_penyakit . '%')->get();
        $menus = $this->menus;
        $judul = "Hasil Pencarian Penyakit";
        $penyakit = isset($query) ? $query : FALSE;
        return view('master_penyakit.result',compact('menus','judul','penyakit'));
    }

    function add()
    {
        $menus = $this->menus;
        $judul = "Input Data  Penyakit";
        $judul_desc = "";
        return view('master_penyakit.create',compact('menus','judul','judul_desc'));
    }


    public function addproses(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'kode_penyakit'         => 'required',
            'nama_penyakit'         => 'required',
            'definisi'              => 'required',
            'keterangan'            => 'required'
        );

        //print_r($_POST); die();

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('message','Error insert data');
            return Redirect::to('backend/penyakit/add');

        } else {
            // store
            $nerd = new Penyakitmodel;
            $nerd->kode_penyakit  = $request->kode_penyakit  ;
            $nerd->nama_penyakit  = $request->nama_penyakit;
            $nerd->definisi   = $request->definisi;
            $nerd->keterangan = $request->keterangan;
            $nerd->img = "";
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully created data!');
            return Redirect::to('backend/penyakit');
        }
    }

    function update(Request $request,$id)
    {
        $data = Penyakitmodel::find($id);
        $menus = $this->menus;
        $judul = "Input Data  Penyakit";
        $judul_desc = "";
        return view('master_penyakit.read',compact('menus','judul','judul_desc','id','data'));
    }

    public function updateproses(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all()); die();
        $rules = array(
            'kode_penyakit'         => 'required',
            'nama_penyakit'         => 'required',
            'definisi'              => 'required',
            'keterangan'            => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        $id = $request->id;
        // process the login
        if ($validator->fails()) {
            Session::flash('message','Error update data');
            return Redirect::to('backend/penyakit/' . $id . '/update')
                ->withErrors($validator);
        } else {
            // store
            $nerd = Penyakitmodel::find($id);
            $nerd->kode_penyakit  = $request->kode_penyakit;
            $nerd->nama_penyakit  = $request->nama_penyakit;
            $nerd->definisi   = $request->definisi;
            $nerd->keterangan = $request->keterangan;
            $nerd->img = "";
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated data!');
            return Redirect::to('backend/penyakit');
        }
    }

    public function delete($id)
    {
        $nerd = Penyakitmodel::find($id);
        $nerd->delete();

        Session::flash('message', 'Successfully delete penyakit!');
        return Redirect::to('backend/penyakit');
    }
}
