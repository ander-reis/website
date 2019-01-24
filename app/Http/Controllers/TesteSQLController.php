<?php

namespace Website\Http\Controllers;

use Illuminate\Http\Request;
use Website\Models\User;

class TesteSQLController extends Controller
{
    public function index()
    {
//        $data = User::where('Codigo_Professor', '=', 571)->firstOrFail();
        $data = User::where('id_noticia', '=', 481)->firstOrFail();
        return view('website.teste-sqlsrv.index', compact('data'));
    }
}
