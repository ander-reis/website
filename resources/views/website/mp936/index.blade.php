@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h2 class="mb-4">Cálculo da Redução de Salário MP936</h2>

            <form id="calculoMpForm">
                <div class="row" style="height: 100px !important;">
                    <div class="form-group col-8 col-sm-6 col-md-4">
                        <label for="ds_salario"><span class="font-weight-bold">Informe o seu salário</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                            </div>
                            <input type="text" class="form-control" name="ds_salario" id="ds_salario"
                                   aria-describedby="Informe o seu salário">
                        </div>
                    </div>
                    <div class="col-4 col-sm-3 col-md-6">
                        <button type="button" class="btn btn-primary" style="margin-top: 32px">Calcular</button>
                    </div>
                </div>
            </form>

            <hr class="line">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Redução</th>
                    <th scope="col">25%</th>
                    <th scope="col">50%</th>
                    <th scope="col">70%</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Empresa</th>
                    <td>1.125,00</td>
                    <td>750,00</td>
                    <td>450,00</td>
                </tr>
                <tr>
                    <th scope="row">Governo</th>
                    <td>300,00</td>
                    <td>600,00</td>
                    <td>840,00</td>
                </tr>
                <tr>
                    <th scope="row">Recebe</th>
                    <td>1.425,00</td>
                    <td>1.350,00</td>
                    <td>1.290,00</td>
                </tr>
                <tr>
                    <th scope="row">Perda</th>
                    <td>-75,00</td>
                    <td>-150,00</td>
                    <td>-210,00</td>
                </tr>
                </tbody>
            </table>

            <hr class="line">

            <h3>Suspensão do Contrato</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Empresa</th>
                    <th scope="col">Governo</th>
                    <th scope="col">Recebe</th>
                    <th scope="col">Perda</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>0,00</td>
                    <td>1.200,00</td>
                    <td>1.200,00</td>
                    <td>-300,00</td>
                </tr>
                </tbody>
            </table>

            <hr class="line">

            <h3>Suspensão Empresa Receita > 4,8 milhões</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Empresa</th>
                    <th scope="col">Governo</th>
                    <th scope="col">Recebe</th>
                    <th scope="col">Perda</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>450,00</td>
                    <td>840,00</td>
                    <td>1.290,00</td>
                    <td>-210,00</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
    @push('calculos-mp936-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (e) {

                const form = document.getElementById('calculoMpForm');

                $('#ds_salario').mask('00.000,00', {reverse: true});

                FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            ds_salario: {
                                validators: {
                                    notEmpty: {
                                        message: 'Campo obrigatório'
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

