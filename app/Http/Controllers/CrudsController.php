<?php

namespace App\Http\Controllers;

use App\Crud;
use App\Http\Requests;
use Illuminate\Http\Request;


class CrudsController extends Controller
{
    public function index()
    {
        
    }
   
    public function create()
    {
        return view('cruds.create');
        //
    }

    public function find($id)
    {
        $crud = Crud::findOrFail($id);
        
        return view('master_penyakit.read', compact('crud','id'));

    }

    public function finding($id)
    {
        $crud = Crud::findOrFail($id);
        echo json_encode( $crud );

    }

    public function store(Request $request)
    {
        $cruds = new Crud();
        $cruds->nama                = $request->nama;
        $cruds->alamat              = $request->alamat;
        $cruds->tanggal_lahir       = $request->tanggal_lahir;
        $cruds->pekerjaan           = $request->pekerjaan;
        $cruds->save();
        return redirect()->route('index')->with('alert-success','Data berhasil Disimpan.');
        //
    }

    public function update(Request $request, $id)
    {
        $crud = Crud::find($id);
        $crud->nama     = $request->get('nama');
        $crud->alamat   = $request->get('alamat');
        $crud->tanggal_lahir   = $request->get('tanggal_lahir');
        $crud->pekerjaan   = $request->get('pekerjaan');
        $crud->save();
        return redirect('/cruds');
    }

    public function destroy($id)
    {
      $crud = Crud::find($id);
      $crud->delete();

      return redirect('/cruds');
    }
}
