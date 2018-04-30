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
            'present_positif'=>'required',
            'present_negatif'=>'required',
            'absen_positif'=>'required',
            'absen_negatif'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('message','Error insert data');
            return Redirect::to('backend/gejala/add');
        } else {

            $nilai = (object) [
                'pp'=>$request->present_positif,
                'pn'=>$request->present_negatif,
                'ap'=>$request->absen_positif,
                'an'=>$request->absen_negatif
            ];

            $nilai_probabilitas = $this->hitung_probabilitas($nilai);

            $s = new Gejala();
            $s->kode_gejala = $request->kode_gejala;
            $s->nama_gejala = $request->nama_gejala;
            $s->keterangan = '';
            $s->present_positif = $request->present_positif;
            $s->present_negatif = $request->present_negatif;
            $s->absen_negatif = $request->absen_negatif;
            $s->absen_positif = $request->absen_positif;
            $s->probabilitas = $nilai_probabilitas;
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
            'present_positif'=>'required',
            'present_negatif'=>'required',
            'absen_positif'=>'required',
            'absen_negatif'=>'required'
        ];
        $id = $e->id;
        $validator = Validator::make($e->all(), $rules);
        if ($validator->fails()) {
            Session::flash('message','Error update data');
            return Redirect::to('backend/gejala/'.$id.'/update');
        } else {

            $nilai = (object) [
                'pp'=>$e->present_positif,
                'pn'=>$e->present_negatif,
                'ap'=>$e->absen_positif,
                'an'=>$e->absen_negatif
            ];

            $nilai_probabilitas = $this->hitung_probabilitas($nilai);

            // print_r($nilai_probabilitas); die();


            $s =  Gejala::find($id);
            $s->kode_gejala = $e->kode_gejala;
            $s->nama_gejala = $e->nama_gejala;
            $s->keterangan = '';
            $s->present_positif = $e->present_positif;
            $s->present_negatif = $e->present_negatif;
            $s->absen_negatif = $e->absen_negatif;
            $s->absen_positif = $e->absen_positif;
            $s->probabilitas = $nilai_probabilitas;
            $s->save();

            Session::flash('message','Success  update data');
            return Redirect::to('backend/gejala');
        }
    }


    function hitung_probabilitas($nilai)
    {
            $P1 = $nilai->pp * $nilai->pp;
            $P2 = $nilai->pp * $nilai->ap;
            $P3 = $nilai->ap * $nilai->pn;
            $P4 = $nilai->ap * $nilai->an;

            return  $P1 / ($P1 + $P3);
            
    }


    

    public function deleted($id)
    {
        $nerd = Gejala::find($id);
        $nerd->delete();

        Session::flash('message', 'Successfully delete data');
        return Redirect::to('backend/gejala');
    }
}
