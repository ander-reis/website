<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Models\CoronaDenuncia;
use Website\Models\CoronaMotivos;

class CoronaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.corona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            if($data['id_motivo'] !== 1){
                $motivo = CoronaMotivos::findOrFail($data['id_motivo']);
                $data['ds_descricao'] = $motivo->ds_descricao;
            }
            CoronaDenuncia::create($data);

            toastr()->success('Obrigado por suas informações!');

            return redirect()->route('corona.index');
        } catch (\Exception $e) {
            toastr()->error("Não foi possível criar o cadastro" . $e->getMessage());
        }
    }
}
