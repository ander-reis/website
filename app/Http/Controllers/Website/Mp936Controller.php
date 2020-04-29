<?php

namespace Website\Http\Controllers\website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;

class Mp936Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.mp936.index');
    }
}
