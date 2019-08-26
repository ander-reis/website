<?php

namespace Website\Http\Controllers;

use Illuminate\Http\Request;

class EstatutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.estatuto.index');
    }
}
