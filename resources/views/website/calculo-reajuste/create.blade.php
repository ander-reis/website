@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h1>Dissídio Coletivo 2019 - confira os seus salários</h1>
            <p >
                Use os seus holerites para verificar se você tem diferenças salariais retroativas a março de 2019 para receber. Você também conhecerá a base correta para o cálculo do reajuste de março/2020, que deve ser divulgado até o dia 23/03.
            </p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(['route' => 'calculo-reajuste.store', 'method' => 'POST', 'id' => 'createCalculoReajusteForm']) }}
            @component('website.calculo-reajuste._form', ['meses' => $meses])@endcomponent
            {{ Form::submit('Salvar', ['name' => 'btnSubmit', 'id' => 'btnSubmit','class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
    @push('form-calculos-reajuste-script')
        <script type="text/javascript">

            function TestaCNPJ(strCNPJ) {
                cnpj = strCNPJ.replace(/[^\d]+/g,'');

                if(cnpj == '') return true;

                if (cnpj.length != 14)
                    return false;

                // Elimina CNPJs invalidos conhecidos
                if (cnpj == "00000000000000" ||
                    cnpj == "11111111111111" ||
                    cnpj == "22222222222222" ||
                    cnpj == "33333333333333" ||
                    cnpj == "44444444444444" ||
                    cnpj == "55555555555555" ||
                    cnpj == "66666666666666" ||
                    cnpj == "77777777777777" ||
                    cnpj == "88888888888888" ||
                    cnpj == "99999999999999")
                    return false;

                // Valida DVs
                tamanho = cnpj.length - 2
                numeros = cnpj.substring(0,tamanho);
                digitos = cnpj.substring(tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(0))
                    return false;

                tamanho = tamanho + 1;
                numeros = cnpj.substring(0,tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(1))
                    return false;

                return true;
           }

            document.addEventListener('DOMContentLoaded', function (e) {
                document.getElementById("ds_fantasia").focus();

                const form = document.getElementById('createCalculoReajusteForm');

                $('#ds_cnpj').mask('00.000.000/0000-00', {reverse: true});
                $('#vl_fev').mask('00.000,00', {reverse: true});
                $('#vl_resultado').mask('00.000,00', {reverse: true});
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
                    document.getElementById('titulo').innerText = 'Hora-aula';
                    document.getElementById('fevereiro').innerText = 'Insira a hora-aula de fevereiro/2019';
                    document.getElementById('instrucao').innerHTML = '';
                    document.getElementById('instrucao1').innerHTML = 'Informe os valores da hora-aula pagos mês a mês. Para enviar os dados ao SinproSP, clique no botão <b>Salvar</b>';

                });
                $("#fl_tipo").on("click", function () {
                    document.getElementById('titulo').innerText = 'Salário Base';
                    document.getElementById('fevereiro').innerText = 'Insira o salário base de feveveiro/2019';
                    document.getElementById('instrucao').innerHTML = '(use apenas o salário base do holerite. Desconsidere a hora-atividade e demais parcelas da remuneração)';
                    document.getElementById('instrucao1').innerHTML = 'Informe os valores do salário base pagos mês a mês (desconsidere a hora-atividade e demais parcelas da remuneração). Para enviar os dados ao SinproSP, clique no botão <b>Salvar</b>';
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
                            if (data.nome != '') {
                                document.getElementById('ds_fantasia').value = data.nome;
                                $("#ds_fantasia").prop("disabled", false);
                            }
                        },
                        error: function (error) {
                            if (error) {
                                console.log(error);
                            }
                        }
                    });
                });
                $("#vl_fev").focusout(function () {
                    e.preventDefault();
                    var reajustado = ($('#vl_fev').val().replace('.', '').replace(',', '.') * 1.039).toFixed(2);
                    $("#vl_reajustado").val(FormatMoney(reajustado,'','','.',',',2,2));
                });
                const trInput = $('#table > tbody > tr');
                $(trInput).on('change', function() {
                    let $this = $(this);
                    let span = $this.find('span');
                    let inputValue = $this.find('input');
                    if (inputValue[0].id === 'vl_fev') {
                        span.html('');
                        ((inputValue.val() !== '') ? span.append('<i class="fas fa-check fa-2x text-success"></i>') : span.append('<i class="fas fa-times fa-2x text-danger"></i>'))
                    }
                    if (inputValue[0].id !== 'vl_fev') {
                        span.html('');
                        const valorBase = ($('#vl_fev').val().replace('.', '').replace(',', '.') * 1.039).toFixed(2);
                        const currentValue = (inputValue.val().replace('.', '').replace(',', '.') * 1).toFixed(2);
                        if(parseFloat(valorBase) <= parseFloat(currentValue)) {
                            span.append('<i class="fas fa-check fa-2x text-success"></i>');
                            $('#fl_diferenca').val('');
                        } else {
                            span.append('<i class="fas fa-times fa-2x text-danger"></i>');
                            $('#fl_diferenca').val(1);
                        }
                    }
                });

                const fvDissidio = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            ds_cnpj: {
                                validators: {
                                    callback: {
                                        message: 'CNPJ inválido',
                                        callback: function(input) {
                                            if (input.value !== '') {
                                                return TestaCNPJ(input.value);
                                            } else {
                                                return true;
                                            }
                                        }
                                    },
                                    blank: {}
                                }
                            },
                            ds_fantasia: {
                                validators: {
                                    notEmpty: {
                                        message: 'Instituição obrigatória'
                                    },
                                    blank: {},
                                }
                            },
                            ds_tipo: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1
                                    }
                                }
                            },
                            vl_fev: {
                                validators: {
                                    callback: {
                                        message: 'Valor para fevereiro/2019 inválido',
                                        callback: function(input) {
                                            if (
                                                parseFloat(
                                                    (input.value.replace('.', '').replace(',', '.') * 1).toFixed(2)) < 10 ) {
                                                return false;
                                            }
                                            return true;
                                        }
                                    },
                                }
                            },
                            fl_nivel: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nível em que leciona obrigatório'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap(),
                            submitButton: new FormValidation.plugins.SubmitButton()
                        },
                    }
                )
                .on('core.form.invalid', function() {
                        document.getElementById("ds_fantasia").focus();
                    }
                )
                .on('core.form.valid', function() {

                    e.preventDefault();

                    if ($("#btnSubmit").prop("value") == "Ir para Home") {
                        window.location.replace("http://www.sinprosp.org.br");
                        return;
                    }

                    var formData = $("#createCalculoReajusteForm").serializeArray();

                    var returnArray = {};
                    for (var i = 0; i < formData.length; i++){
                        returnArray[formData[i]['name']] = formData[i]['value'];
                    }

                    $("#btnSubmit").prop("disabled", true);
                    $("#btnSubmit").prop("value", "Aguarde !!!");

                    FormValidation.utils.fetch('', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        params: returnArray
                    }).then(function(response) {
                        if (response.errors) {
                            for (const field in response.errors) {
                                if ( field == "ds_fantasia") {
                                    // Update the message option
                                    fvCadastrar.updateValidatorOption(field, 'blank', 'message', response.errors['ds_fantasia'])

                                    // Set the field as invalid
                                    fvCadastrar.updateFieldStatus(field, 'Invalid', 'blank');
                                }
                            }

                            $("#btnSubmit").prop("value", "Salvar");
                            $("#btnSubmit").prop("disabled", false);
                        } else {
                            if (response.code == 1) {
                                $("#btnSubmit").prop("value", "Ir para Home");
                                $("#btnSubmit").prop("disabled", false);
                                document.getElementById("ds_fantasia").focus();
                                toastr.success(response.message);
                            }
                            else if (response.code == 2) {
                                $("#btnSubmit").prop("value", "Salvar");
                                $("#btnSubmit").prop("disabled", false);
                                document.getElementById("vl_mar").focus();
                                toastr.warning(response.message);
                            }
                            else {
                                $("#btnSubmit").prop("value", "Ir para Home");
                                $("#btnSubmit").prop("disabled", false);
                                toastr.error(response.message);
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
