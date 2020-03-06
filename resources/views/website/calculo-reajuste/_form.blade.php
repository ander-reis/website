<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
        {{ Form::label('ds_cnpj', 'CNPJ Escola', ['class' => 'control-label']) }}
        <span class="text-danger font-weight-bold">*</span>
        {{ Form::text('ds_cnpj', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
        {{ Form::label('ds_fantasia', 'Escola', ['class' => 'control-label']) }}
        <span class="text-danger font-weight-bold">*</span>
        {{ Form::text('ds_fantasia', null, ['class' => 'form-control', 'disabled']) }}
    @endcomponent
    @component('website.form-components._form_group_inline',['field' => 'fl_status', 'class' => 'col-md-12'])
        <div class="radio{{$errors->has('fl_tipo') ? ' text-danger' : ''}}">
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
    <section class="col-12">
        <table class="table">
            <thead class="text-center">
            <tr>
                <th scope="col">Mês</th>
                <th scope="col"><span id="titulo">Hora Aula</span></th>
                <th scope="col">Resultado</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mesesCalculo as $mes => $meses)
                <tr>
                    <th scope="row">{{ $meses }}</th>
                    <td>
                        {{ Form::text($mes, null, ['class' => 'form-control', 'id' => $mes]) }}
                    </td>
                    <td class="text-center">
                        <span id="icon-{{$mes}}"></span>
{{--                        <i class="fas fa-check"></i>--}}
{{--                        <i class="fas fa-times"></i>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</div>
