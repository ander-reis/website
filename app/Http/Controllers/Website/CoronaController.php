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

            if($data['id_motivo'] == '1') {
                $descricaoMotivo['ds_descricao'] = $data['ds_descricao_motivo'];
                $motivo = CoronaMotivos::create($descricaoMotivo);
                $data['id_motivo'] = $motivo->id;
                $data['ds_descricao'] = $data['ds_descricao_motivo'];
            }

            CoronaDenuncia::create($data);

            toastr()->success('Obrigado por suas informações!');
            return redirect()->route('corona.index');
        } catch (\Exception $e) {
            toastr()->error("Não foi possível criar o cadastro");
        }
    }
}
