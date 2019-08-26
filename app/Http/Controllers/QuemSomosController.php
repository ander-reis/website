<?php

namespace Website\Http\Controllers;

use Illuminate\Http\Request;

class QuemSomosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.quemsomos.index');
    }
}
