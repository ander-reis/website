<?php

namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;
use Website\Models\Boletim;
use Website\Models\BoletimInsc;

use Illuminate\Http\Request;
use Website\Http\Requests\BoletimDestroyRequest;
use Website\Http\Requests\BoletimStoreRequest;

class BoletimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $boletim = Boletim::orderBy('id_boletim', 'desc')->paginate(12);
        return view('website.boletim.index', compact('boletim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Cadastrando ...';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoletimStoreRequest $request)
    {
        try {

            $request['num_matricula'] = (!isset($request['num_matricula']) ? '000000' : substr('000000' . $request['num_matricula'], -6));
            $request['num_cpf'] = (is_null($request['num_cpf']) ? '000.000.000-00' : $request['num_cpf']);
            $request['opt_perg_a'] = (!isset($request['opt_perg_a']) ? 0 : 1);
            $request['opt_perg_b'] = (!isset($request['opt_perg_b']) ? 0 : 1);
            $request['opt_perg_c'] = (!isset($request['opt_perg_c']) ? 0 : 1);

            $request['num_ip'] =  $request->ip();

            $insert = BoletimInsc::firstOrCreate(['ds_email' => $request['ds_email']], $request->all());

            toastr()->success('E-mail cadastrado com sucesso');

            return redirect()->route('boletim.index');
        } catch (\Exception $e) {
            toastr()->error('Não foi possível cadastrar o e-mail');
            // dd($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Website\Boletim  $boletim
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoletimDestroyRequest $request)
    {

        try {
            $delete = BoletimInsc::where('ds_email', $request->ds_email)->delete();

            if ( $delete ) {
                toastr()->success('E-mail excluído com sucesso');
            }
            else {
                toastr()->warning('E-mail não foi localizado em nossa base');
            }

            return redirect()->route('boletim.index');
        } catch (\Exception $e) {
            toastr()->error('Não foi possível excluir o e-mail');
            // dd($e->getMessage());
            return redirect()->back();
        }
    }
}
