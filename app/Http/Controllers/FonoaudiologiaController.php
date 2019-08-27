<?php

namespace Website\Http\Controllers;

use Illuminate\Http\Request;

class FonoaudiologiaController extends Controller
{
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.fonoaudiologia.index');
    }
}
