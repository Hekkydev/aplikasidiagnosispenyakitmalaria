<?php

namespace App\Http\Controllers;

use App\Gejala;
use App\Penyakitmodel;
use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\History;

class DashboardController extends Controller
{   
    
    public function __construct()
    {
        $this->menus = $this->menus();
    }
    
    public function index()
    {
        $menus = $this->menus;
        $judul = "Welcome";
        $judul_desc = "Selamat datang di administrator sistem";

        $gejala = Gejala::all()->count();
        $penyakit = Penyakitmodel::all()->count();
        $user = Admin::all()->count();
        $pasien = User::all()->count();
        $data = [
            'gejala'=>$gejala,
            'penyakit'=>$penyakit,
            'users'=>$user,
            'pasien'=>$pasien
        ];

        $penyakit = DB::select('SELECT COUNT(history_diagnosa.kode_penyakit) AS jumlah_penyakit,history_diagnosa.kode_penyakit,master_penyakit.nama_penyakit FROM history_diagnosa LEFT JOIN master_penyakit ON master_penyakit.kode_penyakit = history_diagnosa.kode_penyakit GROUP BY history_diagnosa.kode_penyakit ');
        $pasien = User::all();
        //print_r($data); die();

        return view('dashboard.page',compact('menus','judul','judul_desc','data','penyakit','pasien'));
    }

    function history()
    {
        $history = DB::select('SELECT 
                    users.name,
                    history_diagnosa.id,
                    history_diagnosa.kode_penyakit,
                    master_penyakit.nama_penyakit ,
                    history_diagnosa.nilai
                    FROM history_diagnosa 
                    LEFT JOIN master_penyakit 
                    ON master_penyakit.kode_penyakit = history_diagnosa.kode_penyakit 
                    LEFT JOIN users 
                    ON users.id = history_diagnosa.kode_user ');
        $menus = $this->menus;
        $judul = 'Laporan Diagnosa Pasien';
        return view('dashboard.history',compact('history','menus','judul'));
    }

    function history_detail($id)
    {
        $history = DB::select('SELECT 
                    users.name,
                    history_diagnosa.id,
                    history_diagnosa.kode_penyakit,
                    master_penyakit.nama_penyakit ,
                    history_diagnosa.nilai,
                    history_diagnosa.created_at,
                    master_penyebab.kode_penyebab,
                    master_penyebab.nama_penyebab,
                    master_solusi.kode_solusi,
                    master_solusi.nama_solusi,
                    history_diagnosa.gejala           
                    FROM history_diagnosa 
                    LEFT JOIN master_penyakit 
                    ON master_penyakit.kode_penyakit = history_diagnosa.kode_penyakit 
                    LEFT JOIN master_penyebab 
                    ON master_penyebab.kode_penyebab = history_diagnosa.kode_penyebab
                    LEFT JOIN master_solusi
                    ON master_solusi.kode_solusi = history_diagnosa.kode_solusi
                    LEFT JOIN users 
                    ON users.id = history_diagnosa.kode_user WHERE history_diagnosa.id = "'.$id.'"');
        $menus = $this->menus;
        $judul = 'Laporan Diagnosa Pasien';
        return view('dashboard.history_detail',compact('history','menus','judul'));
    }
}
