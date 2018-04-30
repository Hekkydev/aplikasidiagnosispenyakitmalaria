<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsulanController extends Controller
{
    public function __construct()
    {
        $this->menus = $this->menus();
    }

    function index()
    {

    }
}
