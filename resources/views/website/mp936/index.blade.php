@extends('layouts.website')

@section('content')
    <div id="no-more-tables-mp" class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h2 class="mb-4">Cálculo da Redução de Salário MP936</h2>
            <form id="calculoMpForm">
                <div class="row" style="height: 100px !important;">
                    <div class="form-group col-12 col-sm-6 col-md-6">
                        <label for="ds_salario"><span class="font-weight-bold">Informe o seu salário</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                            </div>
                            <input type="text" class="form-control" name="vl_salario" id="vl_salario"
                                   aria-describedby="Informe o seu salário">
                        </div>
                    </div>
                </div>
            </form>
            <hr class="line">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Redução</th>
                    <th scope="col" class="text-center">25%</th>
                    <th scope="col" class="text-center">50%</th>
                    <th scope="col" class="text-center">70%</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Empresa</th>
                    <td id="red_emp_25"  class="text-center"></td>
                    <td id="red_emp_50"  class="text-center"></td>
                    <td id="red_emp_70"  class="text-center"></td>
                </tr>
                <tr>
                    <th scope="row">Governo</th>
                    <td id="red_gov_25"  class="text-center"></td>
                    <td id="red_gov_50"  class="text-center"></td>
                    <td id="red_gov_70"  class="text-center"></td>
                </tr>
                <tr>
                    <th scope="row">Recebe</th>
                    <td id="red_rec_25" class="text-center"></td>
                    <td id="red_rec_50" class="text-center"></td>
                    <td id="red_rec_70" class="text-center"></td>
                </tr>
                <tr>
                    <th scope="row">Perda</th>
                    <td id="red_per_25" class="text-center"></td>
                    <td id="red_per_50" class="text-center"></td>
                    <td id="red_per_70" class="text-center"></td>
                </tr>
                </tbody>
            </table>
            <hr class="line">
            <h3>Suspensão do Contrato</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Empresa</th>
                    <th scope="col" class="text-center">Governo</th>
                    <th scope="col" class="text-center">Recebe</th>
                    <th scope="col" class="text-center">Perda</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td id="sus_emp" class="text-center">0, 00</td>
                    <td id="sus_gov" class="text-center"></td>
                    <td id="sus_rec" class="text-center"></td>
                    <td id="sus_per" class="text-center"></td>
                </tr>
                </tbody>
            </table>
            <hr class="line">
            <h3>Suspensão Empresa Receita > 4,8 milhões</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Empresa</th>
                    <th scope="col" class="text-center">Governo</th>
                    <th scope="col" class="text-center">Recebe</th>
                    <th scope="col" class="text-center">Perda</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td id="mil_emp" class="text-center"></td>
                    <td id="mil_gov" class="text-center"></td>
                    <td id="mil_rec" class="text-center"></td>
                    <td id="mil_per" class="text-center"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    @push('calculos-mp936-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (e) {
                function SemMSK(value) {
                    return value.replace('.', '').replace(',', '.');
                }

                function ComMSK(value) {
                    return FormatMoney(value,'','','.',',',2,2)
                }

                document.getElementById("vl_salario").focus();

                $('#vl_salario').mask('00.000,00', {reverse: true});

                $("#vl_salario").keyup(function () {
                    e.preventDefault();
                    var salario = $('#vl_salario').val().replace('.', '').replace(',', '.');

                    if (salario <= 1599.61) {
                        seguro = salario * 0.8;
                    }
                    else if ((salario >= 1599.62) && (salario <= 2666.29) ) {
                        seguro = ((salario - 1599.61) * 0.5) + 1279.69;
                    }
                    else {
                        seguro = 1813.03;
                    }

                    $('#red_emp_25').html(ComMSK(salario * (1 - 0.25)));
                    $('#red_emp_50').html(ComMSK(salario * (1 - 0.50)));
                    $('#red_emp_70').html(ComMSK(salario * (1 - 0.70)));

                    $('#red_gov_25').html(ComMSK(seguro * 0.25));
                    $('#red_gov_50').html(ComMSK(seguro * 0.50));
                    $('#red_gov_70').html(ComMSK(seguro * 0.70));

                    $('#red_rec_25').html(ComMSK(parseFloat(SemMSK($('#red_emp_25').html())) + parseFloat(SemMSK($('#red_gov_25').html()))));
                    $('#red_rec_50').html(ComMSK(parseFloat(SemMSK($('#red_emp_50').html())) + parseFloat(SemMSK($('#red_gov_50').html()))));
                    $('#red_rec_70').html(ComMSK(parseFloat(SemMSK($('#red_emp_70').html())) + parseFloat(SemMSK($('#red_gov_70').html()))));

                    $('#red_per_25').html(ComMSK(parseFloat(SemMSK($('#red_rec_25').html())) - parseFloat(salario)));
                    $('#red_per_50').html(ComMSK(parseFloat(SemMSK($('#red_rec_50').html())) - parseFloat(salario)));
                    $('#red_per_70').html(ComMSK(parseFloat(SemMSK($('#red_rec_70').html())) - parseFloat(salario)));

                    $('#sus_gov').html(ComMSK(seguro));
                    $('#sus_rec').html(ComMSK(parseFloat(seguro) + parseFloat($('#sus_emp').html())));
                    $('#sus_per').html(ComMSK(parseFloat(SemMSK($('#sus_rec').html())) - parseFloat(salario)));


                    $('#mil_emp').html(ComMSK((SemMSK(salario) / 100) * 0.3));
                    $('#mil_gov').html(ComMSK((seguro * 0.7)));

                    $('#mil_rec').html(ComMSK(parseFloat(SemMSK($('#mil_emp').html())) + parseFloat(SemMSK($('#mil_gov').html()))));
                    $('#mil_per').html(ComMSK(parseFloat(SemMSK($('#mil_rec').html())) - parseFloat(salario)));

                });

                const form = document.getElementById('calculoMpForm');

                FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            vl_salario: {
                                validators: {
                                    notEmpty: {
                                        message: 'Salário obrigatório'
                                    },
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
            });
        </script>
    @endpush
@endsection
