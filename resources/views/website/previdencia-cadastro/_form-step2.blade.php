<section>
    <hr class="line">
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('fl_empregador', 'Tipo do Empregador', ['class' => 'control-label']) }}
            {{ Form::select('fl_empregador', \Website\Http\Controllers\Website\PrevidenciaController::tipoEmpregador(), null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('ds_cnpj', 'CNPJ', ['class' => 'control-label']) }}
            {{ Form::text('ds_cnpj', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('ds_empregador', 'Empregador', ['class' => 'control-label']) }}
            {{ Form::text('ds_empregador', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('fl_cargo', 'Cargo', ['class' => 'control-label']) }}
            {{ Form::select('fl_cargo', \Website\Http\Controllers\Website\PrevidenciaController::tipoCargo(), null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('dt_admissao', 'Data admissão', ['class' => 'control-label']) }}
            {{ Form::date('dt_admissao', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('dt_demissao', 'Data saída', ['class' => 'control-label']) }}
            {{ Form::date('dt_demissao', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
        @endcomponent
    </div>
    {{ Form::button('Incluir Dados&nbsp;<i class="fas fa-angle-double-down"></i>', ['class' => 'btn btn-secondary mb-3', 'id' => 'btnInsertGrid']) }}
    {{ form::hidden('id_professor', $model->id, ['id' => 'id_professor']) }}
</section>
<section>
    <h3>Dados</h3>
    <hr class="line">
    <div class="loader">Loading...</div>
    <table class="table table-size" id="no-more-tables-prev" style="display: none">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tipo Empregador</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Empregador</th>
            <th scope="col">Cargo</th>
            <th scope="col">Admissão</th>
            <th scope="col">Saída</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <!-- Template -->
        <tr id="template" style="display: none;">
            <td data-title="ID"><strong><span data-name="prev.id"></span></strong></td>
            <td data-title="Tipo Empregador"><span data-name="prev.fl_empregador"></span></td>
            <td data-title="CNPJ"><span data-name="prev.cnpj"></span></td>
            <td data-title="Empregador"><span data-name="prev.empregador"></span></td>
            <td data-title="Cargo"><span data-name="prev.cargo"></span></td>
            <td data-title="Admissão"><span data-name="prev.admissao"></span></td>
            <td data-title="Demissão"><span data-name="prev.demissao"></span></td>
            <td data-title="Editar" class="text-center">
                <a data-name="prev.edit" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
            <td data-title="Deletar" class="text-center">
                <button type="button" data-name="prev.remove"
                        class="js-remove-button btn btn-outline-danger btn-sm">
                    <i class="fas fa-eraser"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</section>

@push('form-previdencia-dados-script')
    <script type="text/javascript">
        const id_professor = $('#id_professor');
        const tipo_empregador = $('#fl_empregador');
        const cnpj = $('#ds_cnpj');
        const empregador = $('#ds_empregador');
        const cargo = $('#fl_cargo');
        const admissao = $('#dt_admissao');
        const demissao = $('#dt_demissao');
        const url = '{{ env('APP_URL') }}:3000';

        function loadStart() {
            $('.loader').show();
        }

        function loadEnd() {
            $('#no-more-tables-prev').show();
            $('#btnSendData').show();
            $('.loader').hide();
        }

        function inputMasks() {
            cnpj.mask('00.000.000/0000-00', {reverse: true});
        }

        function validationEmpregador() {
            $('#fl_empregador').on('change', function () {
                let $this = $(this);
                if ($this.val() === '5') {
                    cnpj.prop("readonly", true);
                    cnpj.val('00.000.000/0000-00');
                    empregador.prop("readonly", true);
                    empregador.val('Carnê');
                } else {
                    cnpj.prop("readonly", false);
                    cnpj.val('');
                    empregador.prop("readonly", false);
                    empregador.val('');
                }
            });
        }

        function dataPromise() {
            return promise = new Promise((resolve, reject) => {
                FormValidation.utils.fetch('/previdencia-cadastro/data', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    params: {
                        id_professor: $('#id_professor').val(),
                    },
                }).then(function (response) {
                    loadStart();
                    resolve(response);
                }).catch(function (error) {
                    reject(error)
                });
            });
        }

        function remove(id, index) {
            const excluir = confirm(`Excluir Dados?`);
            if (excluir) {
                FormValidation.utils.fetch(`${url}/previdencia-cadastro/data/${id}/delete`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    params: {
                        id: id,
                    },
                }).then(function (response) {
                    if (response) {
                        $(`[data-row-index="${index}"]`).closest('tr').remove();
                        toastr.success('Excluído com Sucesso!')
                    }
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function (e) {
            const form = document.getElementById('previdenciaForm');

            dataPromise().then((response) => {
                rowIndex = 0;
                response.forEach((item, key) => {

                    btnInsertData.removeAttribute('disabled');

                    rowIndex++;
                    const clone = template.cloneNode(true);
                    clone.removeAttribute('id');
                    clone.removeAttribute('style');
                    clone.setAttribute('data-row-index', rowIndex);
                    template.before(clone);

                    clone.querySelector('[data-name="prev.id"]').setAttribute('id', 'prev[' + rowIndex + '].id');
                    clone.querySelector('[data-name="prev.fl_empregador"]').setAttribute('id', 'prev[' + rowIndex + '].fl_empregador');
                    clone.querySelector('[data-name="prev.cnpj"]').setAttribute('id', 'prev[' + rowIndex + '].cnpj');
                    clone.querySelector('[data-name="prev.empregador"]').setAttribute('id', 'prev[' + rowIndex + '].empregador');
                    clone.querySelector('[data-name="prev.cargo"]').setAttribute('id', 'prev[' + rowIndex + '].cargo');
                    clone.querySelector('[data-name="prev.admissao"]').setAttribute('id', 'prev[' + rowIndex + '].admissao');
                    clone.querySelector('[data-name="prev.demissao"]').setAttribute('id', 'prev[' + rowIndex + '].demissao');
                    clone.querySelector('[data-name="prev.remove"]').setAttribute('onclick', `remove(${item.id}, ${rowIndex})`);
                    clone.querySelector('[data-name="prev.edit"]').setAttribute('href', `${url}/previdencia-cadastro/${id_professor.val()}/data/${item.id}/edit`);

                    // data table
                    clone.querySelector('[data-name="prev.id"]').append(rowIndex);
                    clone.querySelector('[data-name="prev.fl_empregador"]').append(response[key].fl_empregador);
                    clone.querySelector('[data-name="prev.cnpj"]').append(response[key].ds_cnpj);
                    clone.querySelector('[data-name="prev.empregador"]').append(response[key].ds_empregador);
                    clone.querySelector('[data-name="prev.cargo"]').append(response[key].fl_cargo);
                    clone.querySelector('[data-name="prev.admissao"]').append(response[key].dt_admissao);
                    clone.querySelector('[data-name="prev.demissao"]').append(response[key].dt_demissao);
                });
                loadEnd();
            });

            inputMasks();
            validationEmpregador();

            const btnInsertData = form.querySelector('[id="btnSendData"]');
            const btnInsertGrid = form.querySelector('[id="btnInsertGrid"]');

            const template = document.getElementById('template');
            let rowIndex = 0;

            const fv2 = FormValidation.formValidation(
                form,
                {
                    fields: {
                        fl_empregador: {
                            validators: {
                                choice: {
                                    min: 1,
                                    max: 1,
                                    message: 'Tipo Empregador obrigatório'
                                },
                                greaterThan: {
                                    message: 'Selecione Tipo Empregador',
                                    min: 1,
                                }
                            }
                        },
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
                        ds_empregador: {
                            validators: {
                                notEmpty: {
                                    message: 'Empregador obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 150,
                                    message: 'Máximo 30 carecteres'
                                },
                            }
                        },
                        fl_cargo: {
                            validators: {
                                choice: {
                                    min: 1,
                                    max: 1,
                                    message: 'Cargo obrigatório'
                                },
                                greaterThan: {
                                    message: 'Selecione Cargo',
                                    min: 1,
                                }
                            }
                        },
                        dt_admissao: {
                            format: 'YYYY/MM/DD',
                            message: 'Data obrigatório',
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
                        fieldStatus: new FormValidation.plugins.FieldStatus({
                            onStatusChanged: function (areFieldsValid) {
                                if (areFieldsValid) {
                                    // btnInsertData.removeAttribute('disabled');
                                } else {
                                    btnInsertData.setAttribute('disabled', 'disabled');
                                }
                            }
                        }),
                    },
                }
            ).on('core.form.valid', function (e) {
                btnInsertData.removeAttribute('disabled');
                FormValidation.utils.fetch('/previdencia-cadastro/data', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    params: {
                        id_professor: id_professor.val(),
                        fl_empregador: tipo_empregador.val(),
                        ds_cnpj: cnpj.val(),
                        ds_empregador: empregador.val(),
                        fl_cargo: cargo.val(),
                        dt_admissao: admissao.val(),
                        dt_demissao: demissao.val(),
                    },
                }).then(function (response) {
                    if(response.id) {
                        rowIndex++;
                        const clone = template.cloneNode(true);
                        clone.removeAttribute('id');
                        clone.removeAttribute('style');
                        clone.setAttribute('data-row-index', rowIndex);
                        template.before(clone);

                        clone.querySelector('[data-name="prev.id"]').setAttribute('id', 'prev[' + rowIndex + '].id');
                        clone.querySelector('[data-name="prev.fl_empregador"]').setAttribute('id', 'prev[' + rowIndex + '].fl_empregador');
                        clone.querySelector('[data-name="prev.cnpj"]').setAttribute('id', 'prev[' + rowIndex + '].cnpj');
                        clone.querySelector('[data-name="prev.empregador"]').setAttribute('id', 'prev[' + rowIndex + '].empregador');
                        clone.querySelector('[data-name="prev.cargo"]').setAttribute('id', 'prev[' + rowIndex + '].cargo');
                        clone.querySelector('[data-name="prev.admissao"]').setAttribute('id', 'prev[' + rowIndex + '].admissao');
                        clone.querySelector('[data-name="prev.demissao"]').setAttribute('id', 'prev[' + rowIndex + '].demissao');
                        clone.querySelector('[data-name="prev.remove"]').setAttribute('onclick', `remove(${response.id}, ${rowIndex})`);
                        clone.querySelector('[data-name="prev.edit"]').setAttribute('href', `${url}/previdencia-cadastro/${id_professor.val()}/data/${response.id}/edit`);

                        // data table
                        clone.querySelector('[data-name="prev.id"]').append(rowIndex);
                        clone.querySelector('[data-name="prev.fl_empregador"]').append(response.fl_empregador);
                        clone.querySelector('[data-name="prev.cnpj"]').append(response.ds_cnpj);
                        clone.querySelector('[data-name="prev.empregador"]').append(response.ds_empregador);
                        clone.querySelector('[data-name="prev.cargo"]').append(response.fl_cargo);
                        clone.querySelector('[data-name="prev.admissao"]').append(response.dt_admissao);
                        clone.querySelector('[data-name="prev.demissao"]').append(response.dt_demissao);
                    } else {
                        toastr.error('Erro: dados não foram enviados!')
                    }
                });
            });

            btnInsertGrid.addEventListener('click', function () {
                fv2.validate();
            });
        });
    </script>
@endpush
