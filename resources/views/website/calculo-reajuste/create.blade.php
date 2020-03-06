@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Cálculo Reajuste</h1>


        {{ Form::open(['route' => 'calculo-reajuste.store', 'id' => 'createCalculoReajusteForm']) }}

        @component('website.calculo-reajuste._form', ['mesesCalculo' => $mesesCalculo])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>

    @push('form-calculos-reajuste-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (e) {
                const form = document.getElementById('createCalculoReajusteForm');

                $('#ds_cnpj').mask('00.000.000/0000-00', {reverse: true});
                $('#vl_fev').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_mar').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_abr').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_mai').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_jun').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_jul').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_ago').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_set').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_out').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_nov').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_dez').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_jan').mask('000.000.000.000.000,00', {reverse: true});
                $('#vl_fev1').mask('000.000.000.000.000,00', {reverse: true});

                $("#fl_tipo_ativo").on("click", function () {
                    document.getElementById('titulo').innerText = 'Hora Aula';
                });
                $("#fl_tipo").on("click", function () {
                    document.getElementById('titulo').innerText = 'Salário Base';
                });

                $("#ds_cnpj").focusout(function () {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('/calculo-reajuste/busca') }}",
                        method: 'post',
                        dataType: 'json',
                        data: {
                            cnpj: $('#ds_cnpj').val(),
                        },
                        success: function (data) {
                            console.log(data);
                            document.getElementById('ds_fantasia').value = data.nome;
                            $("#ds_fantasia").prop("disabled", false);
                        },
                        error: function (error) {
                            if (error) {
                                console.log(error);
                            }
                        }
                    });
                });


                $('#vl_mar').focusout(function () {
                    const valorBase = (document.getElementById('vl_fev').value.replace(',', '.') * 1.039).toFixed(2);
                    const vl_mar = document.getElementById('vl_mar').value.replace(',', '.');
                    console.log('base: ' + valorBase, 'vl_mar: ' + vl_mar, 'result: ' + ((valorBase < vl_mar) ? true : false));
                    ((valorBase < vl_mar) ? $('#icon-vl_mar').append('<i class="fas fa-check"></i>') : $('#icon-vl_mar').append('<i class="fas fa-times"></i>'))
                });

                $("#vl_abr").focusout(function () {
                    const valorBase = document.getElementById('vl_fev').value.replace(',', '.') * 1.039;
                    const vl_abr = document.getElementById('vl_abr').value.replace(',', '.');
                    console.log('base: ' + valorBase, 'vl_abr: ' + vl_abr, 'result: ' + ((valorBase < vl_abr) ? true : false));
                    ((valorBase < vl_abr) ? $('#icon-vl_abr').append('<i class="fas fa-check"></i>') : $('#icon-vl_abr').append('<i class="fas fa-times"></i>'))
                });


                FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            ds_cnpj: {
                                validators: {
                                    notEmpty: {
                                        message: 'CNPJ obrigatório'
                                    },
                                    stringLength: {
                                        min: 18,
                                        max: 18,
                                        message: 'CNPJ inválido'
                                    },
                                }
                            },
                            ds_fantasia: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nome obrigatório'
                                    },
                                }
                            },
                            ds_tipo: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1
                                    }
                                }
                            }
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
@endsection

