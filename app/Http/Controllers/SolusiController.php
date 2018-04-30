<?php

namespace App\Http\Controllers;


use App\Solusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SolusiController extends Controller
{
    public function __construct()
    {
        $this->menus = $this->menus();
    }
    
    public function index()
    {
        $menus  = $this->menus;
        $judul = "Daftar Solusi";
        $solusi = Solusi::all();
        return view('master_solusi.page',compact('judul','menus','solusi'));
    }

    public function add()
    {
        $menus  = $this->menus;
        $judul = "Daftar Solusi";
        return view('master_solusi.add',compact('menus','judul'));
    }

    public function addproses(Request  $request)
    {
        $rules = [
            'kode_solusi'=>'required',
            'nama_solusi'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            Session::flash('message','Error  insert data');
            return Redirect::to('backend/solusi/add');
        } else {
            
            $s = new Solusi();
            $s->kode_solusi = $request->kode_solusi;
            $s->nama_solusi = $request->nama_solusi;
            $s->save();

            Session::flash('message','Success  insert data');
            return Redirect::to('backend/solusi');

        }
        
    }

    public function update($id)
    {
        $menus  = $this->menus;
        $judul = "Daftar Solusi";
        $data = Solusi::find($id);
        return view('master_solusi.read',compact('menus','judul','data'));
    }
    

    public function updateproses(Request  $request)
    {
        $rules = [
            'kode_solusi'=>'required',
            'nama_solusi'=>'required',
        ];

        $id = $request->id;

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            Session::flash('message','Error  update data');
            return Redirect::to('backend/solusi/'.$id.'/update');
        } else {
            
            $s = Solusi::find($id);
            $s->kode_solusi = $request->kode_solusi;
            $s->nama_solusi = $request->nama_solusi;
            $s->save();

            Session::flash('message','Success  update data');
            return Redirect::to('backend/solusi');

        }
    }


    public function deleted($id)
    {
        $s = Solusi::find($id);
        $s->delete();
        Session::flash('message','Success  deleted data');
        return Redirect::to('backend/solusi');
    }

}
