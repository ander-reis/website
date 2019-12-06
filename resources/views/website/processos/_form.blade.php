<h5>Informações Pessoais</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-8'])
        {{ Form::label('Nome', 'Nome', ['class' => 'control-label']) }}
        {{ Form::text('Nome', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('Sexo', 'Sexo', ['class' => 'control-label']) }}
        {{ Form::select('Sexo', ['Masculino', 'Feminino'], null, ['placeholder' => 'Selecione o Sexo', 'class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('CPF', 'CPF', ['class' => 'control-label']) }}
        {{ Form::text('CPF', (isset($cpf) ? $cpf : null) , ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('RG', 'RG', ['class' => 'control-label']) }}
        {{ Form::text('RG', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('Data_Aniversario', 'Data de Nascimento', ['class' => 'control-label']) }}
        {{ Form::date('Data_Aniversario', (isset($model->Data_Aniversario) ? dataInputFormatted($model->Data_Aniversario) : null), ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-6'])
        {{ Form::label('PIS', 'PIS', ['class' => 'control-label']) }}
        {{ Form::text('PIS', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-6'])
        {{ Form::label('Nome_Mae', 'Nome completo da Mãe', ['class' => 'control-label']) }}
        {{ Form::text('Nome_Mae', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<h5>Endereço</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('CEP', 'CEP', ['class' => 'control-label']) }}
        <div class="input-group">
{{--            <input type="text" class="form-control" name="CEP" id="CEP" aria-label="Pesquisar Cep" aria-describedby="search-cep">--}}
            {{ Form::text('CEP', null, ['class' => 'form-control', 'id' => 'CEP']) }}
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="search-cep">Pesquisar</button>
            </div>
{{--            <input type="text" class="form-control" name="ds_cep" id="ds_cep" aria-label="Pesquisar Cep" aria-describedby="search-cep">--}}
        </div>
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-6'])
        {{ Form::label('endereco', 'Endereço', ['class' => 'control-label']) }}
        {{ Form::text('endereco', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-2'])
        {{ Form::label('numero', 'Número', ['class' => 'control-label']) }}
        {{ Form::text('numero', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
{{--<div class="row">--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])--}}
{{--        {{ Form::label('complemento', 'Complemento', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('complemento', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])--}}
{{--        {{ Form::label('bairro', 'Bairro', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('bairro', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])--}}
{{--        {{ Form::label('cidade', 'Cidade', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('cidade', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])--}}
{{--        {{ Form::label('estado', 'Estado', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('estado', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--</div>--}}
{{--<h5>Contato</h5>--}}
{{--<hr class="line">--}}
{{--<div class="row">--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])--}}
{{--        {{ Form::label('email1', 'E-mail 1', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('email1', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])--}}
{{--        {{ Form::label('email2', 'E-mail 2', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('email2', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])--}}
{{--        {{ Form::label('email3', 'E-mail 3', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('email3', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--</div>--}}
{{--<h5>Telefones</h5>--}}
{{--<hr class="line">--}}
{{--<div class="row">--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-3 col-md-2'])--}}
{{--        {{ Form::label('ddd_telefone_residencial', 'DDD', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('ddd_telefone_residencial', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-9 col-md-4'])--}}
{{--        {{ Form::label('telefone_residencial', 'Residencial', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('telefone_residencial', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-3 col-md-2'])--}}
{{--        {{ Form::label('ddd_telefone_celular', 'DDD', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('ddd_telefone_celular', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-9 col-md-4'])--}}
{{--        {{ Form::label('telefone_celular', 'Celular', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('telefone_celular', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--</div>--}}
{{--<h5>Conta Bancária</h5>--}}
{{--<hr class="line">--}}
{{--<div class="row">--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])--}}
{{--        {{ Form::label('banco', 'Banco', ['class' => 'control-label']) }}--}}
{{--        {{ Form::select('banco', \Website\Models\CadastroBanco::all()->pluck('Banco', 'CodBanco')->prepend('Selecione o Banco', '0'), null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])--}}
{{--        {{ Form::label('agencia', 'Agência', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('agencia', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])--}}
{{--        {{ Form::label('conta', 'Conta', ['class' => 'control-label']) }}--}}
{{--        {{ Form::text('conta', null, ['class' => 'form-control']) }}--}}
{{--    @endcomponent--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-3'])--}}
{{--        {{ Form::label('fl_status', 'É conta poupança?', ['class' => 'control-label']) }}--}}
{{--        <div class="radio{{$errors->has('fl_status') ? ' text-danger' : ''}}">--}}
{{--            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                {{ Form::radio('fl_status', '1', true, ['class' => 'custom-control-input', 'id' => 'fl_status_ativo']) }}--}}
{{--                {{ Form::label('fl_status_ativo', 'Ativo', ['class' => 'custom-control-label']) }}--}}
{{--            </div>--}}
{{--            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                {{ Form::radio('fl_status', '0', false, ['class' => 'custom-control-input', 'id' => 'fl_status']) }}--}}
{{--                {{ Form::label('fl_status', 'Oculto', ['class' => 'custom-control-label']) }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endcomponent--}}
{{--    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-3'])--}}
{{--        {{ Form::label('fl_status', 'É conta conjunta?', ['class' => 'control-label']) }}--}}
{{--        <div class="radio{{$errors->has('fl_status') ? ' text-danger' : ''}}">--}}
{{--            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                {{ Form::radio('fl_status', '1', true, ['class' => 'custom-control-input', 'id' => 'fl_status_ativo']) }}--}}
{{--                {{ Form::label('fl_status_ativo', 'Ativo', ['class' => 'custom-control-label']) }}--}}
{{--            </div>--}}
{{--            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                {{ Form::radio('fl_status', '0', false, ['class' => 'custom-control-input', 'id' => 'fl_status']) }}--}}
{{--                {{ Form::label('fl_status', 'Oculto', ['class' => 'custom-control-label']) }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endcomponent--}}

        @push('form-processos-script')
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function (e) {
                    const form = document.getElementById('processoForm');

                    $('#CEP').mask('00000-000');
                    $('#CPF').mask('000.000.000-00', {reverse: true});
                    // $('#ds_fone').mask('(00) 0000-0000');
                    // $('#ds_celular').mask('(00) 00000-0000');

                    $("#search-cep").on("click", function (){
                        pesquisacep(CEP.value);
                    });

                    FormValidation.formValidation(
                        form,
                        {
                            fields: {
                                CEP: {
                                    validators: {
                                        notEmpty: {
                                            message: 'Cep obrigatório'
                                        },
                                        stringLength: {
                                            min: 1,
                                            max: 9,
                                            message: 'Máximo 9 carecteres'
                                        },
                                        regexp: {
                                            regexp: /^[0-9]{5}-[0-9]{3}$/,
                                            message: 'Cep inválido'
                                        }
                                    }
                                },
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger(),
                                bootstrap: new FormValidation.plugins.Bootstrap(),
                                submitButton: new FormValidation.plugins.SubmitButton(),
                                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                                icon: new FormValidation.plugins.Icon({
                                    valid: 'fa fa-check',
                                    invalid: 'fa fa-times',
                                    validating: 'fa fa-refresh'
                                }),
                            },
                        }
                    );
                });
            </script>
        @endpush
</div>
