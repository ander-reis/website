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
            function noenter() {
                return !(window.event && window.event.keyCode == 13);
            }

            function FormatMoney(amount, currency_symbol_before,
                currency_symbol_after, thousands_separator, decimal_point,
                significant_after_decimal_pt, display_after_decimal_pt)
            {
                // 30JUL2008 MSPW  Fixed minus display by moving this line to the top
                // We need to know how the significant digits will alter our displayed number
                var significant_multiplier = Math.pow(10, significant_after_decimal_pt);

                // Only display a minus if the final displayed value is going to be <= -0.01 (or equivalent)
                var str_minus = (amount * significant_multiplier <= -0.5 ? "-" : "");

                // Sanity check on the incoming amount value
                amount = parseFloat(amount);

                if( isNaN(amount) || Math.LOG10E * Math.log(Math.abs(amount)) +
                        Math.max(display_after_decimal_pt, significant_after_decimal_pt) >= 21 )
                {
                    return str_minus + currency_symbol_before +
                        (isNaN(amount)? "#" : "####################".substring(0, Math.LOG10E * Math.log(Math.abs(amount)))) +
                        (display_after_decimal_pt >= 1?
                            (decimal_point + "##################".substring(0, display_after_decimal_pt)) : "") +
                        currency_symbol_after;
                }

                // Make +ve and ensure we round up/down properly later by adding half a penny now.
                amount = Math.abs(amount) + (0.5 / significant_multiplier);

                amount *= significant_multiplier;

                var str_display = parseInt(
                    parseInt(amount) * Math.pow(10, display_after_decimal_pt - significant_after_decimal_pt) ).toString();

                // Prefix as many zeroes as is necessary and strip the leading 1
                if( str_display.length <= display_after_decimal_pt )
                    str_display = (Math.pow(10, display_after_decimal_pt - str_display.length + 1).toString() +
                        str_display).substring(1);

                var comma_sep_pounds = str_display.substring(0, str_display.length - display_after_decimal_pt);
                var str_pence = str_display.substring(str_display.length - display_after_decimal_pt);

                if( thousands_separator.length > 0 && comma_sep_pounds.length > 3 )
                {
                    comma_sep_pounds += ",";

                    // We need to do this twice because the first time only inserts half the commas.  The reason is
                    // the part of the lookahead ([0-9]{3})+ also consumes characters; embedding one lookahead (?=...)
                    // within another doesn't seem to work, so (?=[0-9](?=[0-9]{3})+,)(.)(...) fails to match anything.
                    if( comma_sep_pounds.length > 7 )
                        comma_sep_pounds = comma_sep_pounds.replace(/(?=[0-9]([0-9]{3})+,)(.)(...)/g, "$2,$3");

                    comma_sep_pounds = comma_sep_pounds.replace(/(?=[0-9]([0-9]{3})+,)(.)(...)/g, "$2,$3");

                    // Remove the fake separator at the end, then replace all commas with the actual separator
                    comma_sep_pounds = comma_sep_pounds.substring(0, comma_sep_pounds.length - 1).replace(/,/g, thousands_separator);
                }

                return str_minus + currency_symbol_before +
                    comma_sep_pounds + (display_after_decimal_pt >= 1? (decimal_point + str_pence) : "") +
                    currency_symbol_after;
            }

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
                    document.getElementById('titulo').innerText = 'Hora Aula';
                    document.getElementById('fevereiro').innerText = 'Hora Aula de Fev/2019';
                });
                $("#fl_tipo").on("click", function () {
                    document.getElementById('titulo').innerText = 'Salário Base';
                    document.getElementById('fevereiro').innerText = 'Salário Base de Fev/2019';
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
                FormValidation.formValidation(
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
                            },
                            vl_fev: {
                                validators: {
                                    callback: {
                                        message: 'Valor para Fev/2019 inválido',
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
                                        message: 'Nível de Ensino obrigatório'
                                    }
                                }
                            },

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap(),
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            defaultSubmit: new FormValidation.plugins.DefaultSubmit()
                        },
                    }
                );
            });
        </script>
    @endpush
@endsection
