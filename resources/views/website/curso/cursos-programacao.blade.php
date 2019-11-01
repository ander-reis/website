@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('cursos.programacao') }}

    <div class="row">
        <div class="col-md-12">
            <h1>Programação de Cursos</h1>
            <div class="form-group">
                <label for="mes">Selecione um Mês</label>
                <select class="form-control" id="mes"></select>
            </div>

            <div>
                <p>
                    Confira o conteúdo de cada curso nos links. A inscrição pode ser feita por telefone (5080-5974 ou
                    5080-5988) ou na sede do Sindicato (rua Borges Lagoa, 208, Vila Clementino), de segunda a sexta, das
                    8h30 às 17h30.
                </p>
                <p>
                    As inscrições podem ser feitas até às 15h do próprio dia do curso, de acordo com a disponibilidade
                    de vagas. Neste caso, o pagamento deverá ser efetuado, pessoalmente no SinproSP, em dinheiro ou
                    cartão. Já para pagamentos em boleto bancário, a inscrição somente poderá ser feita até, no máximo,
                    2 dias antes do início do curso.
                </p>
            </div>
            <hr>
            <h5 id="mes-titulo" class="mb-5"></h5>
            @include('website.components.layout-1._preloader')
            <div id="cursos"></div>
        </div>
    </div>

    @push('cursos-script')
        <script type="text/javascript">
            $(document).ready(function () {
                // lista cursos mes atual
                $.ajax({
                    url: "{{ url('/cursos/listar') }}",
                    method: 'get',
                    dataType: 'json',
                    data: { },
                    success: function (data) {
                        // se vazio
                        if(data.model.length === 0){
                            let curso = '<h6>Não há cursos agendados neste mês!</h6>';
                            $('#cursos').append(curso);
                        }
                        // configura mes inicial
                        $('#mes-titulo').append(data.meses[0].option);
                        // preenche select
                        for (var i in data.meses){
                            let options = "<option value=" + data.meses[i].value + ">" + data.meses[i].option + "</option>";
                            $('#mes').append(options);
                        }
                        // preenche cursos
                        let cursos = data.model;
                        for (var i in cursos){
                            let curso = `
                            <h6><a href="/cursos/programacao/${cursos[i].cur_cur_cd_curso}" class="text-link">${cursos[i].cur_cur_ds_tema}</a></h6>
                            <div class="mb-4">${cursos[i].cur_dt_dt_data} das ${cursos[i].cur_cur_hr_inicio}h - ${cursos[i].cur_cur_hr_final}h
                            <p>Docente: ${cursos[i].cur_docente}</p>
                            </div>`;
                            $('#cursos').append(curso);
                        }
                    }
                });
                // evento select change
                $('#mes').change(function (e) {
                    // loading start
                    $(document).ajaxStart(() => {
                        $('#preloader').delay(1).fadeIn();
                    });
                    // reset cursos
                    $('#cursos').html('');
                    // pega mes do select
                    let text = $("#mes option:selected").text();
                    //configura mes selecionado
                    $('#mes-titulo').text('');
                    $('#mes-titulo').append(text);
                    // ajax select data source
                    e.preventDefault();
                    $.ajax({
                        url: "{{ url('/cursos/selecionar') }}",
                        method: 'get',
                        dataType: 'json',
                        data: { id: $(this).val() },
                        success: function (data) {
                            // se vazio
                            if(data.model.length === 0){
                                let curso = '<h6>Não há cursos agendados neste mês!</h6>';
                                $('#cursos').append(curso);
                            }
                            // preenche cursos
                            let cursos = data.model;
                            for (var i in cursos){
                                let curso = `
                                <h6><a href="/cursos/programacao/${cursos[i].cur_cur_cd_curso}" class="text-link">${cursos[i].cur_cur_ds_tema}</a></h6>
                                <div class="mb-4">${cursos[i].cur_dt_dt_data} das ${cursos[i].cur_cur_hr_inicio}h - ${cursos[i].cur_cur_hr_final}h
                                <p>Docente: ${cursos[i].cur_docente}</p>
                                </div>`;
                                $('#cursos').append(curso);
                            }
                        }
                    });
                    // loading stop
                    $(document).ajaxComplete(() => {
                        $('#preloader').hide();
                    });
                });
            });
        </script>
    @endpush
@endsection
