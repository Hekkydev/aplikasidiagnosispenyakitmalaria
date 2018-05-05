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
                'history_diagnosa.kode_penyakit',
                'history_diagnosa.created_at',
                'history_diagnosa.gejala',
                'history_diagnosa.nilai'
            )
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


    public function ProsesDiagnosa(Request $e)
    {
         
        $jumlah_master_gejala = [];
        $master_gejala = 0;
        $daftar_gejala = [];
        $daftar_gejala_2 = [];
        foreach ($e->all() as $key => $value) {

            if ($value == '1') {
                $gejala = DB::table('master_gejala')->where('kode_gejala', $key)->first();
                $data = $gejala->bobot;
                $master_gejala += $gejala->bobot;

                $result = ['kode_gejala'=>$gejala->kode_gejala,'nama_gejala'=>$gejala->nama_gejala,'bobot'=>$gejala->bobot];
                array_push($jumlah_master_gejala, $data);
                array_push($daftar_gejala, $result);
                array_push($daftar_gejala_2, $result);

            }
        }

        $result_hasil_gejala = [];
        
       
        $total = 0;
        $no = 1;

        $dempstershafer = array();
        foreach ($daftar_gejala as $dg) {
                $return = [
                    $this->getStringPenyakit($dg['kode_gejala']),$dg['bobot']
                ];

                array_push($dempstershafer,$return);
        }


        $daftar_gejala_shift = array_shift($daftar_gejala); 
        foreach ($daftar_gejala as $dg) {
                $return = [
                    'hitung'=>'M'.$no,
                    'nama_gejala'=>$dg['nama_gejala'],
                    'bobot'=>$dg['bobot'],
                    'hasil'=>1 - $dg['bobot'],
                    'daftar_penyakit'=>$this->getPenyakit($dg['kode_gejala'])
                ];

                array_push($result_hasil_gejala,$return);

                $total += $no;
            $no++;
        }
       
       $nilai_hitung = count($result_hasil_gejala) +1;
        $result_hasil_gejala_shift = [
            
                   [
                    'hitung'=>'M'.$nilai_hitung,
                    'nama_gejala'=>$daftar_gejala_shift['nama_gejala'],
                    'bobot'=>$daftar_gejala_shift['bobot'],
                    'hasil'=>1 - $daftar_gejala_shift['bobot'],
                    'daftar_penyakit'=>$this->getPenyakit($daftar_gejala_shift['kode_gejala'])
                   ]
        ];


       

        $userId = Auth::id();
        $user = User::find($userId);
        $hitung = $result_hasil_gejala;
        $hitung_2 = $result_hasil_gejala_shift;
        $dempstershaferResult = $this->dempstershafer($dempstershafer);
        return view('membership.diagnosa_hasil_1',compact('hitung','user','daftar_gejala','daftar_gejala_2','hitung_2','response','dempstershaferResult'));

    }

    function dempstershafer($mixarray)
    {
        $data = $mixarray;
        $all=array();
        foreach($data as $d) $all[]=$d[0];
        $unique=array_unique(explode(',',implode(',',$all)));
        $fod=implode(',',$unique);
        //echo "<pre>";
        //echo $fod;
        $rst=array();
        while(!empty($data)){
            $result=array();
            $symptom[0]=array_shift($data);
            $symptom[1]=array($fod,1-$symptom[0][1]);
            if(empty($rst))
                $result[0]=array_shift($data);
            else
                foreach($rst as $k=>$r)
                    if($k!="&theta;")
                        $result[]=array($k,$r);
            $theta=1;
            foreach($result as $r) $theta-=$r[1];
            $result[]=array($fod,$theta);
            $m=count($result);
            $rst=array();
            for($x=0;$x<$m;$x++){
                for($y=0;$y<2;$y++){
                    if(!($x==$m-1 && $y==1)){
                        $v=explode(',',$symptom[$y][0]);
                        $w=explode(',',$result[$x][0]);
                        sort($v);sort($w);
                        $vw=array_intersect($v,$w);
                        if(empty($vw)) $v="&theta;";else $v=implode(',',$vw);
                        if(!isset($rst[$v])) $rst[$v]=$result[$x][1]*$symptom[$y][1];
                        else $rst[$v]+=$result[$x][1]*$symptom[$y][1];
                    }
                }
            }
            foreach($rst as $k=>$r) if($k!="&theta;") $rst[$k]=$r/(1-(isset($rst["&theta;"])?$rst["&theta;"]:0));
            //print_r($rst);
        }
        unset($rst["&theta;"]);
        arsort($rst);
        return $rst;
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
        return $gejala->bobot;
    }

    public function getPenyakit($kode_gejala)
    {
           $penyakit =  DB::table('master_rules')
                            ->select('nama_penyakit')
                            ->leftJoin('master_penyakit','master_rules.kode_penyakit','=','master_penyakit.kode_penyakit')
                            ->where('master_rules.kode_gejala',$kode_gejala)
                            ->get();


         return $penyakit;
    }

    public function getStringPenyakit($kode_gejala)
    {
        $penyakit =  DB::table('master_rules')
                            ->select('nama_penyakit')
                            ->leftJoin('master_penyakit','master_rules.kode_penyakit','=','master_penyakit.kode_penyakit')
                            ->where('master_rules.kode_gejala',$kode_gejala)
                            ->get();


          $hasil = '';
          foreach ($penyakit as $p) {
                $hasil .= $p->nama_penyakit.' ,';
          }

          return substr($hasil,0,-1);
    
    }


    function viewhasil()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $rules = DB::table('history_diagnosa')
            ->select(
                'history_diagnosa.kode_penyakit',
                'history_diagnosa.created_at',
                'history_diagnosa.gejala',
                'history_diagnosa.nilai'
            )
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
