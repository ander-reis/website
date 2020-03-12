<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-6 fl'])
        {{ Form::label('ds_fantasia', 'Instituição', ['class' => 'control-label font-weight-bold']) }}<span class="text-danger font-weight-bold">*</span>
        {{ Form::text('ds_fantasia', null, ['class' => 'form-control', 'onkeypress' => "return noenter()"]) }}
    @endcomponent
    @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
        {{ Form::label('ds_cnpj', 'CNPJ da Instituição', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::text('ds_cnpj', null, ['class' => 'form-control', 'onkeypress' => "return noenter()"]) }}
    @endcomponent

    @component('website.form-components._form_group_inline', ['field' => 'fl_status', 'class' => 'col-md-6 calculo-reajuste-radio'])
        <div class="radio">
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('fl_tipo', '0', true, ['class' => 'custom-control-input', 'id' => 'fl_tipo_ativo', 'onkeypress' => "return noenter()"]) }}
                {{ Form::label('fl_tipo_ativo', 'Aulista', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('fl_tipo', '1', false, ['class' => 'custom-control-input', 'id' => 'fl_tipo', 'onkeypress' => "return noenter()"]) }}
                {{ Form::label('fl_tipo', 'Mensalista', ['class' => 'custom-control-label']) }}
            </div>
        </div>
    @endcomponent
    @component('website.form-components._form_group_inline',['field' => 'fl_nivel', 'class' => 'col-md-6'])
        <div>
            {{ Form::label('nivel', 'Nível em que leciona', ['class' => 'control-label font-weight-bold']) }}<span class="text-danger font-weight-bold">*</span>
            {{ Form::select('fl_nivel', ['0' => 'Educação Infantil', '1' => 'Fundamental I', '2' => 'Fundamental II', '3' => 'Médio', '4' => 'Técnico', '5' => 'Supletivo', '6' => 'Pré-vestibular'], null, ['class' => 'form-control', 'id' => 'fl_nivel', 'placeholder' => '']) }}
        </div>
    @endcomponent
    @component('website.form-components._form_group_inline',['field' => 'base', 'class' => 'col-md-12'])
    <div class="form-group row mb-0">
        <div class="form-group col-md-6">
            {{ Form::label('fevereiro', 'Insira a hora-aula de fevereiro/2019', ['class' => 'control-label font-weight-bold', 'id' => 'fevereiro']) }}<span class="text-danger font-weight-bold">*</span>

            {{ Form::text('vl_fev', null, ['class' => 'form-control', 'id' => 'vl_fev', 'onkeypress' => "return noenter()"]) }}
            <p class="h6"  id="instrucao">

            </p>
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('reajustado', 'Valor com Reajuste de 3,90%', ['class' => 'control-label font-weight-bold']) }}
            {{ Form::text('vl_reajustado', null, ['class' => 'form-control','readonly', 'id' => 'vl_reajustado', 'onkeypress' => "return noenter()"]) }}
            <p class="h6">
                (este valor também será a base de cálculo para março/2020)
            </p>
        </div>
    </div>
    @endcomponent
    @component('website.form-components._form_group_inline',['field' => 'ds_instrucao', 'class' => 'col-md-12'])
    <p class="h6" id="instrucao1">
        Informe os valores da hora-aula pagos mês a mês. Para enviar os dados ao SinproSP, clique no botão <b>Salvar</b>
    </p>
    @endcomponent
    <section class="col-12">
        <table class="table" id="table">
            <thead class="text-center">
            <tr>
                <th scope="col">Mês</th>
                <th scope="col"><span id="titulo">Hora-aula</span></th>
                <th scope="col">Reajuste</th>
            </tr>
            </thead>
            <tbody>
            @foreach($meses as $id => $mes)
                <tr>
                    <th scope="row">{{ $mes }}</th>
                    <td>
                        {{ Form::text($id, null, ['class' => 'form-control', 'id' => $id, 'onkeypress' => "return noenter()"]) }}
                    </td>
                    <td class="text-center">
                        <span id="icon-{{$id}}"></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</div>
