<?php

namespace App\Http\Controllers;

use App\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class GejalaController extends Controller
{
    public function __construct()
    {
        $this->menus = $this->menus();
    }
    function index()
    {
            $menus = $this->menus;
            $judul = "Daftar Gelaja";
            $gejala = DB::table('master_gejala')
                                ->orderByRaw('id ASC')
                                ->get();
            return view('master_gejala.page',compact('menus','judul','gejala'));
    }

    public function add()
    {
        $menus = $this->menus;
        $judul = "Daftar Gelaja";
       
        return view('master_gejala.add',compact('menus','judul'));
    }

    function addproses(Request $request)
    {
        $rules = [
            'kode_gejala'=>'required',
            'nama_gejala'=>'required',
            'bobot'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('message','Error insert data');
            return Redirect::to('backend/gejala/add');
        } else {

           

            $nilai_bobot = $request->bobot;

            $s = new Gejala();
            $s->kode_gejala = $request->kode_gejala;
            $s->nama_gejala = $request->nama_gejala;
            $s->keterangan = '';
            $s->bobot = $nilai_bobot;
            $s->save();

            Session::flash('message','Success  insert data');
            return Redirect::to('backend/gejala');
        }
        
    }

    public function update($id)
    {
        $menus = $this->menus;
        $judul = "Data Gejala";
        $data =  Gejala::find($id);
        return view('master_gejala.read',compact('menus','judul','data'));
    }

    public function updateproses(Request $e)
    {
        $rules = [
            'id'=>'required',
            'kode_gejala'=>'required',
            'nama_gejala'=>'required',
            'bobot'=>'required'
        ];
        $id = $e->id;
        $validator = Validator::make($e->all(), $rules);
        if ($validator->fails()) {
            Session::flash('message','Error update data');
            return Redirect::to('backend/gejala/'.$id.'/update');
        } else {

          
            $nilai_bobot = $request->bobot;

            // print_r($nilai_probabilitas); die();


            $s =  Gejala::find($id);
            $s->kode_gejala = $e->kode_gejala;
            $s->nama_gejala = $e->nama_gejala;
            $s->keterangan = '';
            $s->bobot = $nilai_bobot;
            $s->save();

            Session::flash('message','Success  update data');
            return Redirect::to('backend/gejala');
        }
    }


    


    

    public function deleted($id)
    {
        $nerd = Gejala::find($id);
        $nerd->delete();

        Session::flash('message', 'Successfully delete data');
        return Redirect::to('backend/gejala');
    }
}
