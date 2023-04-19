<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index(){
        return view('equipos.index');
    }
}
