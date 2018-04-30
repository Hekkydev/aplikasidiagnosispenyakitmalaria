<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Rules;
use App\History;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        $rules = DB::table('history_diagnosa')
            ->select(
                'master_penyakit.nama_penyakit',
                'master_solusi.nama_solusi',
                'master_penyebab.nama_penyebab',
                'history_diagnosa.created_at',
                'history_diagnosa.gejala',
                'history_diagnosa.nilai'
            )
            ->leftJoin('master_penyakit', 'history_diagnosa.kode_penyakit', '=', 'master_penyakit.kode_penyakit')
            ->leftJoin('master_solusi', 'history_diagnosa.kode_solusi', '=', 'master_solusi.kode_solusi')
            ->leftJoin('master_penyebab', 'history_diagnosa.kode_penyebab', '=', 'master_penyebab.kode_penyebab')
            ->where('history_diagnosa.kode_user',$user->id)->limit(1);
        $history = $rules->get();


        return view('home',compact('user','history'));
    }

    public function diagnosa()
    {
        $gejala = DB::table('master_gejala')
            ->orderByRaw('id ASC')
            ->get();
        return view('membership.diagnosa', compact('gejala'));
    }

    public function prosesdiagnosa(Request $e)
    {
        
       

        $jumlah_master_gejala = [];
        $master_gejala = 0;
        $daftar_gejala = [];
        foreach ($e->all() as $key => $value) {

            if ($value == '1') {
                $gejala = DB::table('master_gejala')->where('kode_gejala', $key)->first();
                $data = $gejala->probabilitas;
                $master_gejala += $gejala->probabilitas;

                $result = $gejala->kode_gejala;
                array_push($jumlah_master_gejala, $data);
                array_push($daftar_gejala, $result);

            }
            //  else {

            //     $master_gejala += 0;
            //     $data = [];
            //     array_push($jumlah_master_gejala, $data);
            // }
        }



        $array = implode("','",$daftar_gejala);
//        $gejala_data = DB::connection('mysql')
//            ->select("SELECT `kode_penyakit` FROM master_rules WHERE kode_gejala IN('$array')");

 //       $gejala_data = Rules::wherein('kode_gejala',$daftar_gejala)->first();
 
        $gejala_data = collect(DB::connection('mysql')
                        ->select("SELECT COUNT(*),kode_penyakit,kode_penyebab,kode_solusi FROM master_rules WHERE kode_gejala IN('$array') GROUP BY kode_penyakit ORDER BY COUNT(*) DESC"))->first();
        if($gejala_data == TRUE){
            $penyakit = $this->info_penyakit($gejala_data->kode_penyakit);
            $penyebab = $this->info_penyebab($gejala_data->kode_penyebab);
            $solusi = $this->info_solusi($gejala_data->kode_solusi);

            //print_r($gejala); die();


            $jumlah_nilai = $master_gejala;
            $jml_pembagi = count($jumlah_master_gejala);
            $hasil = $jumlah_nilai / $jml_pembagi;

            //print_r($hasil); die();
            $data = (object)[
                'penyakit' => $penyakit,
                'solusi'=>$solusi,
                'penyebab'=>$penyebab,
                'hasil' => $hasil
            ];


            $userId = Auth::id();
            $user = User::find($userId);

            $gejala_data_2 = [];
            $gejala_data_3 = '';
            foreach ($e->all() as $key => $value) {
                if ($value == '1') {
                    $gejala_set =  ['kode_gejala'=>$key,'nama_gejala'=>$this->info_gejala($key),'probabilitas'=>$this->prob_gejala($key)];
                    $gejala_data_3 .= $this->info_gejala($key).',';
                    array_push($gejala_data_2, $gejala_set);
                }
            }

            $daftar_gejala_dipilih = $gejala_data_2;
            //dd($hasil);
            $s = new  History();
            $s->kode_user = $user->id;
            $s->kode_penyakit = $gejala_data->kode_penyakit;
            $s->kode_penyebab = $gejala_data->kode_penyebab;
            $s->kode_solusi = $gejala_data->kode_solusi;
            $s->gejala = $gejala_data_3;
            $s->nilai = $hasil;
            $s->save();



            return view('membership.diagnosa_hasil', compact('data','user','daftar_gejala_dipilih'));
        }else{
           return redirect('membership/diagnosa');
        }


    }

    function info_penyakit($id)
    {
        $get = DB::table('master_penyakit')->where('kode_penyakit', $id)->first();
        return $get->nama_penyakit;
    }

    function info_solusi($id)
    {
        $get = DB::table('master_solusi')->where('kode_solusi', $id)->first();
        return $get->nama_solusi;
    }

    function info_penyebab($id)
    {
        $get = DB::table('master_penyebab')->where('kode_penyebab', $id)->first();
        return $get->nama_penyebab;
    }


    function info_gejala($id)
    {
        $gejala = DB::table('master_gejala')->where('kode_gejala', $id)->first();
        return $gejala->nama_gejala;
    }

    function prob_gejala($id)
    {
        $gejala = DB::table('master_gejala')->where('kode_gejala', $id)->first();
        return $gejala->probabilitas;
    }


    function viewhasil()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $rules = DB::table('history_diagnosa')
            ->select(
                'master_penyakit.nama_penyakit',
                'master_solusi.nama_solusi',
                'master_penyebab.nama_penyebab',
                'history_diagnosa.created_at',
                'history_diagnosa.gejala',
                'history_diagnosa.nilai'
            )
            ->leftJoin('master_penyakit', 'history_diagnosa.kode_penyakit', '=', 'master_penyakit.kode_penyakit')
            ->leftJoin('master_solusi', 'history_diagnosa.kode_solusi', '=', 'master_solusi.kode_solusi')
            ->leftJoin('master_penyebab', 'history_diagnosa.kode_penyebab', '=', 'master_penyebab.kode_penyebab')
            ->where('history_diagnosa.kode_user',$user->id);
        $history = $rules->get();
        return view('membership.diagnosa_hasil_review',compact('user','history'));
    }

     function profil()
    {
        $userId = Auth::id();
        $data = User::find($userId);
        return view('membership.profil',compact('data'));
    }


    function infoapps()
    {
        $data = [];
        return view('membership.informasi_aplikasi',compact('data'));
    }
} 
