@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Cálculo Reajuste</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::open(['route' => 'calculo-reajuste.store', 'id' => 'createCalculoReajusteForm']) }}

        @component('website.calculo-reajuste._form', ['meses' => $meses])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}

    </div>

    @push('form-calculos-reajuste-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (e) {
                const form = document.getElementById('createCalculoReajusteForm');

                $('#ds_cnpj').mask('00.000.000/0000-00', {reverse: true});
                $('#vl_fev').mask('00.000,00', {reverse: true});
                $('#vl_mar').mask('00.000,00', {reverse: true});
                $('#vl_abr').mask('00.000,00', {reverse: true});
                $('#vl_mai').mask('00.000,00', {reverse: true});
                $('#vl_jun').mask('00.000,00', {reverse: true});
                $('#vl_jul').mask('00.000,00', {reverse: true});
                $('#vl_ago').mask('00.000,00', {reverse: true});
                $('#vl_set').mask('00.000,00', {reverse: true});
                $('#vl_out').mask('00.000,00', {reverse: true});
                $('#vl_nov').mask('00.000,00', {reverse: true});
                $('#vl_dez').mask('00.000,00', {reverse: true});
                $('#vl_jan').mask('00.000,00', {reverse: true});
                $('#vl_fev1').mask('00.000,00', {reverse: true});

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


                const trInput = $('#table > tbody > tr');
                $(trInput).on('change', function() {
                    let $this = $(this);
                    let span = $this.find('span');
                    let inputValue = $this.find('input');
                    // console.log($this);
                    if (inputValue[0].id === 'vl_fev') {
                        span.html('');
                        ((inputValue.val() !== '') ? span.append('<i class="fas fa-check fa-2x text-success"></i>') : span.append('<i class="fas fa-times fa-2x text-danger"></i>'))
                    }

                    if (inputValue[0].id !== 'vl_fev') {
                        span.html('');

                        const valorBase = ($('#vl_fev').val().replace(',', '.') * 1.039).toFixed(2);
                        const currentValue = (inputValue.val().replace(',', '.') * 1).toFixed(2);

                        console.log('valorBase: ', valorBase, 'currentValue: ', currentValue);

                        // ((parseFloat(valorBase) < parseFloat(currentValue)) ? span.append('<i class="fas fa-check fa-2x text-success"></i>') : span.append('<i class="fas fa-times fa-2x text-danger"></i>'))
                        if(parseFloat(valorBase) < parseFloat(currentValue)) {
                            span.append('<i class="fas fa-check fa-2x text-success"></i>');
                            $('#fl_diferenca').val('');
                        } else {
                            span.append('<i class="fas fa-times fa-2x text-danger"></i>');
                            $('#fl_diferenca').val(1);
                        }
                    }
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

