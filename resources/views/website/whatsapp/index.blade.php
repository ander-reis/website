@extends('layouts.website')

@section('content')
    <h1>Whatsapp pesquisa</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            @php
                toastr()->error("Erro: {$error}!");
            @endphp
        @endforeach
    @endif
    <form id="whatsappForm">
        <div class="row">
            @component('website.form-components._form_col_group', ['class' => 'col-12 col-md-12'])
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-dark" type="button" id="searchButton">
                            <i class="fas fa-search"></i>
                            Pesquisar
                        </button>
                    </div>
                    {{ Form::text('searchInput', null, ['class' => 'form-control', 'id' => 'searchInput']) }}
                </div>
            @endcomponent
        </div>
        <div class="search text-center mt-5">
            <i class="fas fa-search fa-10x"></i>
        </div>
    </form>
    <div class="table-responsive-sm table-responsive-md">
        <table id="table-whatsapp" class="table table-hover" style="display: none">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Celular</th>
                <th scope="col">Nome</th>
                <th scope="col">Pergunta</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Pergunta</h5>
                    <p id="dtpergunta"></p>
                    <p id="dspergunta"></p>
                    <hr>
                    <h5>Resposta</h5>
                    <p id="dtresposta"></p>
                    <p id="dsresposta"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('form-whatsapp-script')
    <script type="text/javascript">
        const searchInput = $('#searchInput');

        $('#modal').on('show.bs.modal', function (event) {
            const dataResponse = $(event.relatedTarget)

            const celular = dataResponse.data('celular')
            let nome = dataResponse.data('nome')
            const dspergunta = dataResponse.data('dspergunta')
            const dtpergunta = dataResponse.data('dtpergunta')
            const dsresposta = dataResponse.data('dsresposta')
            const dtresposta = dataResponse.data('dtresposta')

            const modal = $(this)

            if (nome === '') {
                nome = 'Sem nome'
            }

            modal.find('.modal-title').text('Nome: ' + nome + ', Celular: ' + celular)
            modal.find('#nome').html(nome)
            modal.find('#dtpergunta').html('<strong>Data:</strong> ' + dtpergunta)
            modal.find('#dspergunta').html('<strong>Pergunta:</strong> ' + dspergunta)
            modal.find('#dtresposta').html('<strong>Data:</strong> ' + dtresposta)
            modal.find('#dsresposta').html('<strong>Resposta:</strong> ' + dsresposta)
        })

        document.addEventListener('DOMContentLoaded', function (e) {
            const searchButton = document.getElementById('searchButton');
            const form = document.getElementById('whatsappForm');

            const fv = FormValidation.formValidation(
                form,
                {
                    fields: {
                        searchInput: {
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
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh'
                        }),
                    },
                }).on('core.form.validating', function () {
                searchButton.innerHTML = 'Validando ...';
            })

            searchButton.addEventListener('click', function () {
                fv.validate().then(function (status) {

                    $('tbody').children().remove();

                    searchButton.innerHTML = (status === 'Valid') ? "<i class='fa fa-spinner fa-spin fa-fw'></i> Enviando..." : 'Tente novamente';

                    if (status === 'Valid') {
                        FormValidation.utils.fetch('/whatsapp/search', {
                            method: 'GET',
                            params: {
                                searchInput: searchInput.val(),
                            },
                        }).then(function (response) {
                            console.log(response);

                            $('#searchButton').removeClass().addClass('btn btn-outline-success');

                            $('.search').hide();

                            if (response.model.length === 0) {
                                $('.table').hide();
                                $('.search').show();
                                searchButton.innerHTML = 'Nenhum resultado';
                                $('#searchButton').removeClass().addClass('btn btn-outline-danger');
                            }

                            if (response.model.length >= 1) {

                                $('.table').show();

                                searchButton.innerHTML = `${response.model.length} resultados`;

                                const data = response.model;

                                let rowIndex = 1;

                                data.forEach((item, key) => {
                                    data_messages = `
                                    <tr data-toggle="modal" data-target="#modal" data-celular="${item.ds_celular}" data-nome="${item.ds_nome}" data-dspergunta="${item.ds_pergunta}" data-dtpergunta="${item.dt_pergunta}" data-dsresposta="${item.ds_resposta}" data-dtresposta="${item.dt_resposta}">
                                        <th scope="row">${rowIndex++}</th>
                                        <td>${item.ds_celular}</td>
                                        <td>${item.ds_nome}</td>
                                        <td>${item.ds_pergunta}</td>
                                    </tr>
                                    `;
                                    $('tbody').append(data_messages);
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
