<?php

namespace App\Http\Controllers;

use App\Admin as Adminmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{


    public function __construct()
    {
        $this->menus = $this->menus();
    }


   




   function listdata()
   {
       $menus = $this->menus;
       $judul = "Manajemen Akun";
       $account = Adminmodel::all();
       return view('admin.list',compact('menus','account','judul'));
   }

   function add()
   {
        $menus = $this->menus;
        $kode_administrator = strtoupper(uniqid());
        $judul = "Manajemen Akun";
       return view('admin.add',compact('menus','kode_administrator','judul'));
   }

   function addproses(Request $e) {
      $rules = [
          'nama_lengkap'=>'required',
          'username'=>'required',
          'password'=>'required',
      ];

      $validator = Validator::make($e->all(),$rules);

      if ($validator->fails()) {
          Session::flash('message','Error  added data');
          return Redirect::to('backend/account/add');
      } else {

          $s = new Adminmodel();
          $s->kode_administrator = $e->kode_administrator;
          $s->nama_lengkap = $e->nama_lengkap;
          $s->username = $e->username;
          $s->password = $e->password;
          $s->save();

          Session::flash('message','Success  added data');
          return Redirect::to('backend/account');

      }
   }

   function update($id) {

         $menus = $this->menus;
         $judul = "Manajemen Akun";
         $data = Adminmodel::find($id);
         return view('admin.read',compact('menus','data','judul'));
   }


   function updateproses(Request $e) {
      $rules = [
          'nama_lengkap'=>'required',
          'username'=>'required',
          'password'=>'required',
      ];
      $id = $e->id;
      $validator = Validator::make($e->all(),$rules);

      if ($validator->fails()) {
          Session::flash('message','Error  update  data');
          return Redirect::to('backend/account/'.$id.'/update');
      } else {

          $s = Adminmodel::find($id);
          $s->kode_administrator = $e->kode_administrator;
          $s->nama_lengkap = $e->nama_lengkap;
          $s->username = $e->username;
          $s->password = $e->password;
          $s->save();

          Session::flash('message','Success  update data');
          return Redirect::to('backend/account');

      }
   }

   function delete($id) {
     $nerd = Adminmodel::find($id);
     $nerd->delete();

     Session::flash('message', 'Successfully delete data');
     return Redirect::to('backend/account');
   }

   function profile()
   {
            $id =   session('id');
            $menus = $this->menus;
            $judul = "Manajemen Akun";
            $data = Adminmodel::find($id);

            //print_r($data); die();
            return view('admin/profile',compact('menus','data','judul'));
   }


}
