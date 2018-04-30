<?php

namespace App\Http\Controllers;

use App\Gejala;
use App\Penyakitmodel as Penyakit;
use App\Solusi;
use App\Rules;
use App\Penyebab;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class BasisController extends Controller
{
    function __construct()
    {
        $this->menus = $this->menus();
    }

    function index()
    {
            $judul = "Basis Aturan";
            $menus = $this->menus;
            $rules = DB::table('master_rules')
                        ->select('master_rules.id',
                                 'master_penyakit.nama_penyakit',
                                 'master_solusi.nama_solusi',
                                 'master_penyebab.nama_penyebab',
                                 'master_rules.kode_rules'
                            )
                        ->leftJoin('master_penyakit', 'master_rules.kode_penyakit', '=', 'master_penyakit.kode_penyakit')
                        ->leftJoin('master_solusi', 'master_rules.kode_solusi', '=', 'master_solusi.kode_solusi')
                        ->leftJoin('master_penyebab', 'master_rules.kode_penyebab', '=', 'master_penyebab.kode_penyebab')
                        ->groupBy('kode_rules')
                        ->get();       

           //dd($rules);

            return  view('master_base.page', compact('judul','menus','rules'));
            
    }


    function add()
    {
        $judul = 'Basis Aturan / Rules';
        $menus = $this->menus;


        $gejala = Gejala::all();
        $penyakit = Penyakit::all();
        $solusi = Solusi::all();
        $penyebab = Penyebab::all();
        $data = [
            'gejala'=>$gejala,
            'solusi'=>$solusi,
            'penyakit'=>$penyakit,
            'penyebab'=>$penyebab
        ];
        return view('master_base.add',compact('judul','menus','data'));
    }

    public function add_rules(Request $e)
    {
        $kode_rules = strtoupper(uniqid());
        $gejala_dipilih = $e->to;
        foreach ($gejala_dipilih as $key => $value) {
            
            $s = new Rules();
            $s->kode_rules = $kode_rules;
            $s->kode_penyakit = $e->kode_penyakit;
            $s->kode_solusi = $e->kode_solusi;
            $s->kode_penyebab = $e->kode_penyebab;
            $s->kode_gejala = $value;
            $s->save();
        }

        Session::flash('message', 'Successfully delete data');
        return Redirect::to('backend/basis-aturan');
    }
    
    public function detail($id)
    {
        $menus = $this->menus;
        //        $rules = Rules::find($id);
        $rules = DB::table('master_rules')
            ->select('master_rules.id',
                'master_penyakit.nama_penyakit',
                'master_solusi.nama_solusi',
                'master_penyebab.nama_penyebab',
                'master_rules.kode_rules'
            )
            ->leftJoin('master_penyakit', 'master_rules.kode_penyakit', '=', 'master_penyakit.kode_penyakit')
            ->leftJoin('master_solusi', 'master_rules.kode_solusi', '=', 'master_solusi.kode_solusi')
            ->leftJoin('master_penyebab', 'master_rules.kode_penyebab', '=', 'master_penyebab.kode_penyebab')
            ->groupBy('kode_rules')
            ->where('master_rules.id',$id)
            ->first();
        //dd($rules);

        $rules_master = DB::table('master_rules')
                            ->leftJoin('master_gejala','master_gejala.kode_gejala','=','master_rules.kode_gejala')
                            ->where('master_rules.kode_rules',$rules->kode_rules)
                            ->get();
        $gejaladipilih = $rules_master;

        $gejala = Gejala::all();
        $penyakit = Penyakit::all();
        $solusi = Solusi::all();
        $penyebab = Penyebab::all();
        $data = [
            'gejala'=>$gejala,
            'gejaladipilih'=>$gejaladipilih,
            'solusi'=>$solusi,
            'penyakit'=>$penyakit,
            'penyebab'=>$penyebab,
            'rules'=>$rules
        ];
        return view('master_base.detail', compact('menus','rules','data'));
        
    }

    function delete($id)
    {
        DB::table('master_rules')->where('master_rules.kode_rules', '=', $id)->delete();

        Session::flash('message', 'Successfully delete data');
        return Redirect::to('backend/basis-aturan');
    }


    function update_rules(Request $e)
    {
        $deleted = DB::table('master_rules')->where('master_rules.kode_rules', '=', $e->kode_rules)->delete();

        if ($deleted == TRUE)
        {
            $kode_rules = $e->kode_rules;
            $kode_penyakit = $e->kode_penyakit;
            $kode_penyebab = $e->kode_penyebab;
            $kode_solusi = $e->kode_solusi;

            $gejala_dipilih = isset($e->to) ? $e->to : array();
            if($gejala_dipilih == TRUE)
            {
                foreach ($gejala_dipilih as $key => $value) {

                    $s = new Rules();
                    $s->kode_rules = $kode_rules;
                    $s->kode_penyakit = $kode_penyakit;
                    $s->kode_solusi = $kode_solusi;
                    $s->kode_penyebab = $kode_penyebab;
                    $s->kode_gejala = $value;
                    $s->save();
                }
            }

            Session::flash('message', 'Successfully update data');
            return Redirect::to('backend/basis-aturan');

        }else{
            Session::flash('message', 'Error updated data');
            return Redirect::to('backend/basis-aturan');

        }
    }
}
