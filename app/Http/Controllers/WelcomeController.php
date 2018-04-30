<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    public function __construct()
    {
       
    }

   

    function cekLogin(Request $req){
        
           $rules =  [
                
               'username' => [
                               'required',
                               'min:3',
                               'exists:administrator,username'
        
                           ],
               'password' => [
                               'required',
                               'min:3',
                           ],
            
                        ];
               $validator = Validator::make($req->all(),$rules);
        
               if ($validator->fails()) {
                    return redirect('administrator/login')
                                ->withErrors($validator)
                                ->withInput();
                }
        
                $user= $req->username;
                $pass = $req->password;
        
                  $check = Admin::where('username',$user)->where('password',$pass)->count();
                
                  if( !($check > 0) )  {
                       return redirect('administrator/login')->with('status', 'salah');
                  }
        
                  $take = Admin::where('username',$user)->where('password',$pass)->first();
                  
                         session(['id'=>$take->id]);
                         session(['username' => $take->username]);
                         session(['kode_administrator' => $take->kode_administrator]);
                         session(['nama_lengkap'=>$take->nama_lengkap]);
                         session(['password' => true ]);
                         return redirect('backend/dashboard');
           }
        
           function logout(Request $req){
                $req->session()->regenerate();
                $req->session()->flush();
                return redirect('administrator/login');
        }
        
}
