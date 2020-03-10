<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
        {{ Form::label('ds_cnpj', 'CNPJ Escola', ['class' => 'control-label font-weight-bold']) }}
        <span class="text-danger font-weight-bold">*</span>
        {{ Form::text('ds_cnpj', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
        {{ Form::label('ds_fantasia', 'Escola', ['class' => 'control-label font-weight-bold']) }}
        <span class="text-danger font-weight-bold">*</span>
        {{ Form::text('ds_fantasia', null, ['class' => 'form-control', 'disabled']) }}
    @endcomponent
    @component('website.form-components._form_group_inline', ['field' => 'fl_status', 'class' => 'col-md-6 calculo-reajuste-radio'])
        <div class="radio">
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('fl_tipo', '0', true, ['class' => 'custom-control-input', 'id' => 'fl_tipo_ativo']) }}
                {{ Form::label('fl_tipo_ativo', 'Aulista', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('fl_tipo', '1', false, ['class' => 'custom-control-input', 'id' => 'fl_tipo']) }}
                {{ Form::label('fl_tipo', 'Mensalista', ['class' => 'custom-control-label']) }}
            </div>
        </div>
    @endcomponent
    @component('website.form-components._form_group_inline',['field' => 'fl_nivel', 'class' => 'col-md-6'])
        <div>
            {{ Form::label('nivel', 'Nível que leciona', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
            {{ Form::select('fl_nivel', ['0' => 'Infantil', '1' => 'Ens. Fundamental I', '2' => 'Ens. Fundamental II', '3' => 'Ens. Médio', '4' => 'Ens. Superior', '5' => 'Ens. Técnico', '6' => 'Supletivo', '7' => 'Curso Pré-Vestibular'], null, ['class' => 'form-control', 'id' => 'fl_nivel', 'placeholder' => 'Selecione...']) }}
        </div>
    @endcomponent
    @component('website.form-components._form_group_inline',['field' => 'base', 'class' => 'col-md-12'])
    <div class="form-group row mb-0">
        <div class="form-group col-md-6">
            {{ Form::label('fevereiro', 'Hora Aula de Fev/2019', ['class' => 'control-label font-weight-bold', 'id' => 'fevereiro']) }}<span class="text-danger font-weight-bold">*</span>
            {{ Form::text('vl_fev', null, ['class' => 'form-control', 'id' => 'vl_fev']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('reajustado', 'Valor com Reajuste de 3,90%', ['class' => 'control-label font-weight-bold']) }}
            {{ Form::text('vl_reajustado', null, ['class' => 'form-control','readonly', 'id' => 'vl_reajustado']) }}
        </div>
    </div>
    @endcomponent
    <section class="col-12">
        <table class="table" id="table">
            <thead class="text-center">
            <tr>
                <th scope="col">Mês</th>
                <th scope="col"><span id="titulo">Hora Aula</span></th>
                <th scope="col">Reajuste</th>
            </tr>
            </thead>
            <tbody>
            @foreach($meses as $id => $mes)
                <tr>
                    <th scope="row">{{ $mes }}</th>
                    <td>
                        {{ Form::text($id, null, ['class' => 'form-control', 'id' => $id]) }}
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
