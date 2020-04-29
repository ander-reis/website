<?php

namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;

class ZoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.zoom.index');
    }
}
