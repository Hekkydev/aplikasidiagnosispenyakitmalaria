<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Webfront extends Controller
{
    function index()
    {
        return view('webfront.home.page');
    }

    function about()
    {
       // return view('webfront.about.page');
    }

    function contact()
    {
        //return view('webfront.contact.page');
    }
}
