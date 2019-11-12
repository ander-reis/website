<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\CurriculoUpdateRequest;
use Website\Models\CurriculoProfessor;

class CurriculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.curriculo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('website.curriculo.show', compact('id'));
    }

    /**
     * edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editar()
    {
        /**
         * id user logado
         */
        $id = \Auth::user()->id_curriculo;
        /**
         * model select
         */
        $model = CurriculoProfessor::where('id_curriculo', $id)->first([
            'ds_cpf',
            'ds_matricula',
            'ds_nome',
            'ds_sexo',
            'int_estado_civil',
            'dt_data_nasc',
            'ds_endereco',
            'ds_bairro',
            'ds_cidade',
            'ds_estado',
            'ds_cep',
            'ds_pais',
            'email',
            'ds_fone',
            'ds_celular',
            'ds_fax',
            'ds_salario',
            'int_empregado',
            'int_disp_horario',
            'int_disp_cidade',
            'int_formacao',
            'ds_outra_formacao',
            'int_disciplina',
            'int_nivel_atuacao',
            'ds_objetivo',
            'ds_qualificacao',
            'ds_experiencia',
            'ds_user',
            'int_ativo']);

        /**
         * array estados
         */
        $estados = self::estados();

        /**
         * configura estado no model
         */
        $model->ds_estado = array_search($model->ds_estado, $estados);

        return view('website.curriculo.edit', compact('model', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurriculoUpdateRequest $request
     * @param CurriculoProfessor $curriculo
     * @return \Illuminate\Http\Response
     */
    public function update(CurriculoUpdateRequest $request, $id, CurriculoProfessor $curriculo)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            unset($data['_method']);
            unset($data['_token']);
            unset($data['email_confirmation']);
            unset($data['password_confirmation']);

            /**
             * verifica email
             */
            if(empty($data['password'])){
                unset($data['password']);
            } else {
                $data['password'] = Hash::make($data['password']);
            }

            /**
             * configura estado para de integer para string
             */
            $estados = CurriculoController::estados();
            $data['ds_estado'] = Arr::get($estados, $data['ds_estado']);

            /**
             * update
             */
            $curriculo->where('id_curriculo', $id)->update($data);

            toastr()->success('Cadastro alterado com sucesso!');

            return redirect()->route('curriculo.index');
        } catch (\Exception $e) {

            toastr()->error("Não foi possível alterar o cadastro");

            return redirect()->route('curriculo.edit');
        }
    }

    /**
     * select estado civil
     *
     * @return array
     */
    static function estadoCivil()
    {
        return [
            'Selecione Estado Civil',
            'Casado',
            'Convivência Marital',
            'Divorciado',
            'Separado',
            'Solteiro',
            'Viúvo'
        ];
    }

    /**
     * select estados
     *
     * @return array
     */
    static function estados()
    {
        return [
            'Seleciona um Estado',
            'AC',
            'AL',
            'AP',
            'AM',
            'BA',
            'CE',
            'DF',
            'ES',
            'GO',
            'MA',
            'MT',
            'MS',
            'MG',
            'PA',
            'PB',
            'PR',
            'PE',
            'PI',
            'RJ',
            'RN',
            'RS',
            'RO',
            'RR',
            'SC',
            'SP',
            'SE',
            'TO'
        ];
    }
}
