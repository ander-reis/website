@extends('layouts.website')

@section('content')
<div class="row">
    <div class="col-12 col-sm-12 col-md-9">
        <h2 class="mb-4">Como o salário é calculado</h2>
        <div class="mb-2">
            <p class="text-justify">Todas as professoras e professores recebem pelo número de aulas que ministram. O cálculo do salário está
                disciplinado na Convenção Coletiva de Trabalho. A remuneração mensal é formada por, no mínimo, três
                itens:</p>

            <p><h5>Salário base</h5></p>
            <p class="text-justify">Corresponde ao valor mensal das aulas ministradas sobre o qual serão calculados o descanso semanal
                remunerado e o adicional de hora-atividade. Para calcular, basta multiplicar o número de aulas semanais
                por 4,5 semanas e pelo valor da hora-aula.</p>

            <p><h5>Adicional de hora-atividade</h5></p>
            <p class="text-justify">É o adicional destinado exclusivamente a atividade realizadas fora da escola, como preparação de aulas e
                correção de provas e trabalhos. As Convenções Coletivas da educação básica e do ensino superior prevê
                adicional de 5%, aplicado sobre o salário base (os acordos coletivos do Sesi e do Senai garantem 14%).
            </p>
            <p class="text-justify">A hora-atividade se incorpora à remuneração mensal e deve ser paga também durante as férias, recesso e no
                13º Salário.</p>

            <p><h5>Descanso Semanal Remunerado</h5></p>
            <p class="text-justify">Corresponde a 1/6 sobre a remuneração total, ou seja, deve ser calculado sobre a soma do salário-base, da
                hora-atividade, das horas extras e demais adicionais.</p>
            <p class="text-justify">A discriminação do DSR no holerite é obrigatória, exceto para professores mensalistas de educação
                infantil até a 4ª série do ensino fundamental.</p>

            <p><h5>Adicional noturno</h5></p>
            <p class="text-justify">Todo o trabalho realizado a partir das 22 horas deve ser remunerado com acréscimo de 20%. A Convenção
                Coletiva dos professores do ensino superior garante adicional de 25%.</p>

            <p>Escola uma das opções e preencha os campos indicados.</p>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="col-12 m-0 p-0">
                    <div class="p-1 mb-2 rounded bg-secondary text-white text-center">Professor Mensalista</div>
                </div>
                <div class="form-group p-2" style="background: #f1f1f1;border: 1px solid;">
                    <div class="row p-2">
                        <div class="col-12 mb-2">
                            {{ Form::label('lbl_mens_salario', 'Salário', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('vl_mensalista', null, ['id' => 'vl_mensalista','class' => 'form-control', 'placeholder' => 'Informe seu Salário']) }}
                        </div>

                        <div class="col-12 mb-2">
                            {{ Form::label('lbl_mens_atividade', 'Hora Atividade', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('mens_atividade',null, ['id' => 'mens_atividade', 'class' => 'form-control', 'placeholder' => 'R$ 0,00', 'disabled']) }}
                        </div>
                        <div class="col-12 mb-2">
                            {{ Form::label('lbl_mens_total', 'Salário Total', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('mens_total',null, ['id' => 'mens_total', 'class' => 'form-control', 'placeholder' => 'R$ 0,00', 'disabled']) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="col-12 m-0 p-0">
                    <div class="p-1 mb-2 rounded bg-secondary text-white text-center">Professor Aulista</div>
                </div>
                <div class="form-group p-2" style="background: #f1f1f1;border: 1px solid;">
                    <div class="row p-2">
                        <div class="col-lg-6 col-sm-12 mb-2">
                            {{ Form::label('lbl_aul_aula', 'Nº de Aulas Semanais', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('nr_aula', null, ['id' => 'nr_aula','class' => 'form-control', 'placeholder' => 'Nº de aulas semanais']) }}
                        </div>

                        <div class="col-lg-6 col-sm-12 mb-2">
                            {{ Form::label('lbl_aul_hora', 'Valor da Hora-aula', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('vl_hora',null, ['id' => 'vl_hora', 'class' => 'form-control', 'placeholder' => 'R$ 0,00']) }}
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-2">
                            {{ Form::label('lbl_aul_salario', 'Salário Base', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('aul_salario',null, ['id' => 'aul_salario', 'class' => 'form-control', 'placeholder' => 'R$ 0,00', 'disabled']) }}
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-2">
                            {{ Form::label('lbl_aul_atividade', 'Hora-atividade', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('aul_atividade',null, ['id' => 'aul_atividade', 'class' => 'form-control', 'placeholder' => 'R$ 0,00', 'disabled']) }}
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-2">
                            {{ Form::label('lbl_aul_dsr', 'DSR', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('aul_dsr',null, ['id' => 'aul_dsr', 'class' => 'form-control', 'placeholder' => 'R$ 0,00', 'disabled']) }}
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-2">
                            {{ Form::label('lbl_aul_total', 'Salário Total', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('aul_total',null, ['id' => 'aul_total', 'class' => 'form-control', 'placeholder' => 'R$ 0,00', 'disabled']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @component('website.components.layout-1._column_right')@endcomponent
</div>
@push('salario_calcular')
<script type="text/javascript">
    var moeda = new Intl.NumberFormat('pt-BR', {
                    style: 'currency',
                    currency: 'BRL',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

                function calcula_mensalista() {
                    salario = 0;
                    ha = 0;
                    dsr = 0;
                    st = 0;

                    naula = $('#nr_aula').val();

                    haula = $('#vl_hora').val();

                    if ( (typeof eval(naula) == 'number') && (typeof eval(haula) == 'number')) {

                        haula = haula.replace(/[.]/gi, "").replace(",", ".");

                        salario =  (parseInt(naula) * parseFloat(haula)) * 4.5;

                        ha = (salario * 0.05).toFixed(2);

                        dsr = ((parseFloat(salario) + parseFloat(ha)) / 6).toFixed(2);

                        st = (parseFloat(salario) + parseFloat(ha) + parseFloat(dsr)).toFixed(2);
                    }

                    $('#aul_salario').val(moeda.format(salario));
                    $('#aul_atividade').val(moeda.format(ha));
                    $('#aul_dsr').val(moeda.format(dsr));
                    $('#aul_total').val(moeda.format(st));
                }

                $(document).ready(function () {
                    $('#vl_mensalista').mask('000.000.000.000.000,00', {reverse: true});
                    $('#vl_mensalista').keyup(
                        function() {
                            ha = 0;
                            st = 0;

                            salario = $('#vl_mensalista').val();

                            if ( (typeof eval(salario) == 'number')) {
                                salario = salario.replace(/[.]/gi, "").replace(",", ".")

                                ha = (salario * 0.05).toFixed(2);
                                st = parseFloat(salario) + parseFloat(ha);
                            }

                            $('#mens_atividade').val(moeda.format(ha));
                            $('#mens_total').val(moeda.format(st));
                        }
                    )

                    $('#nr_aula').mask('000000', {reverse: true});
                    $('#nr_aula').keyup(
                        function(event) {
                           calcula_mensalista();
                        }
                    )
                    $('#vl_hora').mask('000.000.000.000.000,00', {reverse: true});
                    $('#vl_hora').keyup(
                        function() {
                            calcula_mensalista();
                        }
                    )
                })
</script>
@endpush
@endsection
