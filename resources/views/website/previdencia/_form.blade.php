<div class="row">
    <div class="col-md-9 mb-3 mb-md-5 js-step js-step-active" data-step="1">
        <h1>Cadastro Previdência</h1>
        <section>
            <h3>Dados Pessoais</h3>
            <hr class="line">
            <div class="row">
                @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
                    {{ Form::label('ds_cpf', 'CPF', ['class' => 'control-label']) }}
                    {{ Form::text('ds_cpf', null, ['class' => 'form-control']) }}
                @endcomponent
                @component('website.form-components._form_col_group', ['class' => 'col-md-8'])
                    {{ Form::label('ds_nome', 'Nome', ['class' => 'control-label']) }}
                    {{ Form::text('ds_nome', null, ['class' => 'form-control']) }}
                @endcomponent
            </div>
            <div class="row">
                @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
                    {{ Form::label('dt_nascimento', 'Data de Nascimento', ['class' => 'control-label']) }}
                    {{ Form::date('dt_nascimento', (isset($model->dt_cadastro_utc_formatted) ? $model->dt_cadastro_utc_formatted : \Carbon\Carbon::now()), ['class' => 'form-control']) }}
                @endcomponent
                @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
                    {{ Form::label('ds_celular', 'Celular', ['class' => 'control-label']) }}
                    {{ Form::text('ds_celular', null, ['class' => 'form-control']) }}
                @endcomponent
                @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
                    {{ Form::label('ds_email', 'Email', ['class' => 'control-label']) }}
                    {{ Form::text('ds_email', null, ['class' => 'form-control']) }}
                @endcomponent
            </div>
            <div class="row">
                @component('website.form-components._form_col_group', ['class' => 'col-12 col-md-4'])
                    {{ Form::label('Cep', 'Cep', ['class' => 'control-label']) }}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-info" type="button" id="search-cep">
                                <i class="fas fa-search"></i>
                                Buscar
                            </button>
                        </div>
                        {{ Form::text('CEP', null, ['class' => 'form-control', 'id' => 'CEP']) }}
                    </div>
                @endcomponent
                @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
                    {{ Form::label('endereco', 'Endereço', ['class' => 'control-label']) }}
                    {{ Form::text('endereco', null, ['class' => 'form-control']) }}
                @endcomponent
                @component('website.form-components._form_col_group', ['class' => 'col-md-2'])
                    {{ Form::label('ds_numero', 'Número', ['class' => 'control-label']) }}
                    {{ Form::text('ds_numero', null, ['class' => 'form-control']) }}
                @endcomponent
            </div>
            <div class="row">
                @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
                    {{ Form::label('ds_complemento', 'Complemento', ['class' => 'control-label']) }}
                    {{ Form::text('ds_complemento', null, ['class' => 'form-control']) }}
                @endcomponent
                @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
                    {{ Form::label('bairro', 'Bairro', ['class' => 'control-label']) }}
                    {{ Form::text('bairro', null, ['class' => 'form-control']) }}
                @endcomponent
                @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
                    {{ Form::label('cidade', 'Cidade', ['class' => 'control-label']) }}
                    {{ Form::text('cidade', null, ['class' => 'form-control']) }}
                @endcomponent
                @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
                    {{ Form::label('estado', 'Estado', ['class' => 'control-label']) }}
                    {{ Form::text('estado', null, ['class' => 'form-control']) }}
                @endcomponent
            </div>
        </section>
        {{ Form::button('Próximo&nbsp;<i class="fas fa-angle-double-right"></i>', ['class' => 'btn btn-primary', 'id' => 'nextButton']) }}
    </div>{{--step 1--}}


    <div class="col-md-9 mb-3 mb-md-5 js-step" data-step="2">
        <section>
            <h3>Dados Profissionais</h3>
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
            {{ form::hidden('id_professor', null, ['id' => 'id_professor']) }}
        </section>
        <section>
            <h3>Dados</h3>
            <hr class="line">

            <div class="loader">Loading...</div>

            <table class="table table-size" id="no-more-tables-prev">
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
                    <td data-title="Tipo Empregador" class="td"><span data-name="prev.fl_empregador"></span></td>
                    <td data-title="CNPJ" class="td"><span data-name="prev.cnpj"></span></td>
                    <td data-title="Empregador" class="td"><span data-name="prev.empregador"></span></td>
                    <td data-title="Cargo" class="td"><span data-name="prev.cargo"></span></td>
                    <td data-title="Admissão" class="td"><span data-name="prev.admissao"></span></td>
                    <td data-title="Demissão" class="td"><span data-name="prev.demissao"></span></td>
                    <td data-title="Editar" class="text-center">
                        <button type="button" data-name="prev.edit" data-toggle="modal" data-target="#prevModal"
                                class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </button>
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
        {{ Form::button('<i class="fas fa-check"></i>&nbsp;Enviar Informações', ['class' => 'btn btn-primary', 'id' => 'btnSendData', 'disabled', 'type' => 'submit']) }}
        {{ Form::button('<i class="fas fa-angle-double-left"></i>&nbsp;Voltar', ['class' => 'btn btn-danger', 'id' => 'prevButton']) }}
    </div>
</div>

@push('form-previdencia-script')
    <script type="text/javascript">
        function remove(id, index) {
            const excluir = confirm(`Excluir Dados?`);
            if (excluir) {
                FormValidation.utils.fetch(`/previdencia/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    params: {
                        id: id,
                    },
                }).then(function (response) {
                    console.log(response);
                    if (response) {
                        $(`[data-row-index="${index}"]`).closest('tr').remove();
                        toastr.success('Excluído com Sucesso!')
                    }
                });
            }
        }

        function removeCells() {
            $('[data-row-index]').remove();
        }

        function loadStart() {
            $('.table').hide();
            $('.loader').show();
        }

        function loadEnd() {
            $('.table').show();
            $('.loader').hide();
        }

        function cpfPromise(cpf) {
            const promise = new Promise((resolve, reject) => {
                FormValidation.utils.fetch(`/previdencia/cpf`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    params: {
                        ds_cpf: cpf,
                    },
                }).then(function (response) {
                    resolve(response.id);
                }).catch(function (error) {
                    reject(error)
                });
            });
            return promise;
        }

        document.addEventListener('DOMContentLoaded', function (e) {
            const previdenciaForm = document.getElementById('previdenciaForm');

            loadStart();

            // dados pessoais
            const cpf = $('#ds_cpf');
            const nome = $('#ds_nome');
            const nascimento = $('#dt_nascimento');
            const celular = $('#ds_celular');
            const email = $('#ds_email');
            const cep = $('#CEP');
            const endereco = $('#endereco');
            const numero = $('#ds_numero');
            const complemento = $('#ds_complemento');
            const bairro = $('#bairro');
            const cidade = $('#cidade');
            const estado = $('#estado');

            // dados profissionais
            const id_professor = $('#id_professor');
            const tipo_empregador = $('#fl_empregador');
            const cnpj = $('#ds_cnpj');
            const empregador = $('#ds_empregador');
            const cargo = $('#fl_cargo');
            const admissao = $('#dt_admissao');
            const demissao = $('#dt_demissao');

            // input mask
            cpf.mask('000.000.000-00', {reverse: true});
            cnpj.mask('00.000.000/0000-00', {reverse: true});
            celular.mask('(00) 00000-0000');
            cep.mask('00000-000');
            estado.mask('AA');

            // search cep
            $("#search-cep").on("click", function () {
                pesquisacep(CEP.value);
                numero.val('');
                complemento.val('');
            });

            // validation tipo empregador
            $('#fl_empregador').on('change', function () {
                let $this = $(this);
                if ($this.val() === '5') {
                    cnpj.prop("disabled", true);
                    cnpj.val('00.000.000/0000-00');
                    empregador.prop("disabled", true);
                    empregador.val('Carnê');
                } else {
                    cnpj.prop("disabled", false);
                    cnpj.val('');
                    empregador.prop("disabled", false);
                    empregador.val('');
                    fv2.revalidateField('ds_cnpj');
                    fv2.revalidateField('ds_empregador');
                }
            });

            const step1 = previdenciaForm.querySelector('.js-step[data-step="1"]');
            const step2 = previdenciaForm.querySelector('.js-step[data-step="2"]');

            let currentStep = 1;

            const btnInsertGrid = previdenciaForm.querySelector('[id="btnInsertGrid"]');
            const btnInsertData = previdenciaForm.querySelector('[id="btnSendData"]');

            const prevButton = previdenciaForm.querySelector('[id="prevButton"]');
            const nextButton = previdenciaForm.querySelector('[id="nextButton"]');

            const template = document.getElementById('template');
            let rowIndex = 0;

            const fv1 = FormValidation.formValidation(
                step1,
                {
                    fields: {
                        ds_cpf: {
                            validators: {
                                notEmpty: {
                                    message: 'CPF obrigatório'
                                },
                                callback: {
                                    message: 'CPF inválido',
                                    callback: function (input) {
                                        if (input.value !== '') {
                                            return testaCPF(input.value);
                                        } else {
                                            return true;
                                        }
                                    }
                                },
                                blank: {}
                            }
                        },
                        ds_nome: {
                            validators: {
                                notEmpty: {
                                    message: 'Nome obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 100,
                                    message: 'Máximo 100 carecteres'
                                },
                            }
                        },
                        dt_nascimento: {
                            format: 'YYYY/DD/MM',
                            message: 'Data obrigatório',
                        },
                        ds_celular: {
                            validators: {
                                notEmpty: {
                                    message: 'Celular obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 20,
                                    message: 'Máximo 20 carecteres'
                                },
                            }
                        },
                        ds_email: {
                            validators: {
                                notEmpty: {
                                    message: 'Email obrigatório'
                                },
                                emailAddress: {
                                    message: 'Email inválido'
                                }
                            }
                        },
                        CEP: {
                            validators: {
                                notEmpty: {
                                    message: 'Cep obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 9,
                                    message: 'Máximo 9 carecteres'
                                },
                                regexp: {
                                    regexp: /^[0-9]{5}-[0-9]{3}$/,
                                    message: 'Cep inválido'
                                }
                            }
                        },
                        endereco: {
                            validators: {
                                notEmpty: {
                                    message: 'Endereço obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 80,
                                    message: 'Máximo 80 carecteres'
                                },
                            }
                        },
                        ds_numero: {
                            validators: {
                                notEmpty: {
                                    message: 'Número obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 10,
                                    message: 'Máximo 10 carecteres'
                                },
                            }
                        },
                        bairro: {
                            validators: {
                                notEmpty: {
                                    message: 'Bairro obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 59,
                                    message: 'Máximo 59 carecteres'
                                },
                            }
                        },
                        cidade: {
                            validators: {
                                notEmpty: {
                                    message: 'Cidade obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 32,
                                    message: 'Máximo 32 carecteres'
                                },
                            }
                        },
                        estado: {
                            validators: {
                                notEmpty: {
                                    message: 'Estado obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 2,
                                    message: 'Máximo 2 carecteres'
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
                }
            ).on('core.form.valid', function (e) {
                currentStep++;

                FormValidation.utils.classSet(step1, {
                    'js-step-active': false,
                });
                FormValidation.utils.classSet(step2, {
                    'js-step-active': true,
                });

                /**
                 * cadastro professor
                 */
                cpfPromise(cpf.val()).then(result => {
                    console.log(result);
                    // if (result === undefined) {
                        FormValidation.utils.fetch('/previdencia/professor/table', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            params: {
                                ds_cpf: cpf.val(),
                                ds_nome: nome.val(),
                                dt_nascimento: nascimento.val(),
                                ds_celular: celular.val(),
                                ds_email: email.val(),
                                CEP: cep.val(),
                                endereco: endereco.val(),
                                ds_numero: numero.val(),
                                ds_complemento: complemento.val(),
                                bairro: bairro.val(),
                                cidade: cidade.val(),
                                estado: estado.val(),
                            },
                        }).then(function (response) {
                            loadEnd();
                            console.log(response);
                            id_professor.val(response.id);
                        });
                    // }

                    if (result) {
                        FormValidation.utils.fetch('/previdencia/data', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            params: {
                                id_professor: result,
                            },
                        }).then(function (response) {
                            console.log(response)
                            loadEnd();
                            removeCells();
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

                                // data table
                                clone.querySelector('[data-name="prev.id"]').append(rowIndex);
                                clone.querySelector('[data-name="prev.fl_empregador"]').append(response[key].fl_empregador);
                                clone.querySelector('[data-name="prev.cnpj"]').append(response[key].ds_cnpj);
                                clone.querySelector('[data-name="prev.empregador"]').append(response[key].ds_empregador);
                                clone.querySelector('[data-name="prev.cargo"]').append(response[key].fl_cargo);
                                clone.querySelector('[data-name="prev.admissao"]').append(response[key].dt_admissao);
                                clone.querySelector('[data-name="prev.demissao"]').append(response[key].dt_demissao);

                                // data modal
                                clone.querySelector('[data-name="prev.edit"]').setAttribute('data-id', item.id);
                                clone.querySelector('[data-name="prev.edit"]').setAttribute('data-fl_empregador', item.fl_empregador);
                                clone.querySelector('[data-name="prev.edit"]').setAttribute('data-cnpj', item.ds_cnpj);
                                clone.querySelector('[data-name="prev.edit"]').setAttribute('data-empregador', item.ds_empregador);
                                clone.querySelector('[data-name="prev.edit"]').setAttribute('data-cargo', item.fl_cargo);
                                clone.querySelector('[data-name="prev.edit"]').setAttribute('data-admissao', item.dt_admissao);
                                clone.querySelector('[data-name="prev.edit"]').setAttribute('data-demissao', item.dt_demissao);
                                clone.querySelector('[data-name="prev.edit"]').setAttribute('data-index', rowIndex);
                            });
                        });
                    }
                });
            });

            const fv2 = FormValidation.formValidation(
                step2,
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
                                    btnInsertData.removeAttribute('disabled');
                                } else {
                                    btnInsertData.setAttribute('disabled', 'disabled');
                                }
                            }
                        }),
                    },
                }
            ).on('core.form.valid', function (e) {
                FormValidation.utils.fetch('/previdencia/data/table', {
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

                    // data table
                    clone.querySelector('[data-name="prev.id"]').append(rowIndex);
                    clone.querySelector('[data-name="prev.fl_empregador"]').append(response.fl_empregador);
                    clone.querySelector('[data-name="prev.cnpj"]').append(response.ds_cnpj);
                    clone.querySelector('[data-name="prev.empregador"]').append(response.ds_empregador);
                    clone.querySelector('[data-name="prev.cargo"]').append(response.fl_cargo);
                    clone.querySelector('[data-name="prev.admissao"]').append(response.dt_admissao);
                    clone.querySelector('[data-name="prev.demissao"]').append(response.dt_demissao);

                    // data modal
                    clone.querySelector('[data-name="prev.edit"]').setAttribute('data-id', response.id);
                    clone.querySelector('[data-name="prev.edit"]').setAttribute('data-fl_empregador', response.fl_empregador);
                    clone.querySelector('[data-name="prev.edit"]').setAttribute('data-cnpj', response.ds_cnpj);
                    clone.querySelector('[data-name="prev.edit"]').setAttribute('data-empregador', response.ds_empregador);
                    clone.querySelector('[data-name="prev.edit"]').setAttribute('data-cargo', response.fl_cargo);
                    clone.querySelector('[data-name="prev.edit"]').setAttribute('data-admissao', response.dt_admissao);
                    clone.querySelector('[data-name="prev.edit"]').setAttribute('data-demissao', response.dt_demissao);
                    clone.querySelector('[data-name="prev.edit"]').setAttribute('data-index', rowIndex);
                });
            });

            btnInsertGrid.addEventListener('click', function () {
                fv2.validate();
            });

            nextButton.addEventListener('click', function () {
                switch (currentStep) {
                    case 1:
                        fv1.validate();
                        break;
                    case 2:
                        fv2.validate();
                        break;
                    default:
                        break;
                }
            });

            prevButton.addEventListener('click', function () {
                switch (currentStep) {
                    case 2:
                        currentStep--;
                        FormValidation.utils.classSet(step2, {
                            'js-step-active': false,
                        });
                        FormValidation.utils.classSet(step1, {
                            'js-step-active': true,
                        });
                        break;
                    case 1:
                    default:
                        break;
                }
            });

            const fv3 = FormValidation.formValidation(
                step1,
                {
                    fields: {
                        ds_cpf: {
                            validators: {
                                notEmpty: {},
                                callback: {
                                    message: 'CPF inválido',
                                    callback: function (input) {
                                        if (input.value !== '') {
                                            return testaCPF(input.value);
                                        } else {
                                            return true;
                                        }
                                    }
                                },
                                blank: {}
                            }
                        },
                    },
                }
            );

            const validCpf = document.getElementById('ds_cpf');
            validCpf.addEventListener('blur', function (event) {
                fv3.validate().then(function (status) {
                    if (status === 'Valid') {
                        FormValidation.utils.fetch(`/previdencia/cpf`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            params: {
                                ds_cpf: cpf.val(),
                            },
                        }).then(function (response) {
                            if (response.id) {
                                nome.val(response.ds_nome);
                                nascimento.val(response.dt_nascimento);
                                celular.val(response.ds_celular);
                                email.val(response.ds_email);
                                cep.val(response.ds_cep);
                                endereco.val(response.ds_endereco);
                                numero.val(response.ds_numero);
                                complemento.val(response.ds_complemento);
                                bairro.val(response.ds_bairro);
                                cidade.val(response.ds_cidade);
                                estado.val(response.ds_uf);
                                id_professor.val(response.id);
                            } else {
                                id_professor.val('');
                            }
                        });
                    }
                });
            });

            $('#fl_empregador_modal').on('change', function () {
                let $this = $(this);
                if ($this.val() === '5') {
                    $('#ds_cnpj_modal').prop("disabled", true);
                    $('#ds_cnpj_modal').val('00.000.000/0000-00');
                    $('#ds_empregador_modal').prop("disabled", true);
                    $('#ds_empregador_modal').val('Carnê');
                } else {
                    $('#ds_cnpj_modal').prop("disabled", false);
                    $('#ds_cnpj_modal').val('');
                    $('#ds_empregador_modal').prop("disabled", false);
                    $('#ds_empregador_modal').val('');
                }
            });

            $('#prevModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget)

                const id = button.data('id');
                const fl_empregador = button.data('fl_empregador');
                const cnpj = button.data('cnpj');
                const empregador = button.data('empregador');
                const cargo = button.data('cargo');
                const admissao = button.data('admissao');
                const demissao = button.data('demissao');
                const index = button.data('index');

                if (fl_empregador === 'Carnê') {
                    $('#ds_cnpj_modal').prop("disabled", true);
                    $('#ds_cnpj_modal').val('00.000.000/0000-00');
                    $('#ds_empregador_modal').prop("disabled", true);
                    $('#ds_empregador_modal').val('Carnê');
                } else {
                    $('#ds_cnpj_modal').prop("disabled", false);
                    $('#ds_empregador_modal').prop("disabled", false);
                }

                $('#ds_cnpj_modal').mask('00.000.000/0000-00', {reverse: true});

                const flEmpregador = [
                    "Escolha um Tipo",
                    "Escola Privada",
                    "Escola Estadual",
                    "Escola Municipal",
                    "Empresa",
                    "Carnê"
                ];
                const tipoEmpregador = flEmpregador.indexOf(fl_empregador);

                const dsCargo = [
                    "Escolha um Cargo",
                    "Professor Superior",
                    "Professor Básico",
                    "Outra Profissão"
                ];
                const tipoCargo = dsCargo.indexOf(cargo);

                const dtAdmissao = moment(admissao, 'DD-MM-YYYY').format();
                const dtDemissao = moment(demissao, 'DD-MM-YYYY').format();

                $('#id_modal').val(id);
                $('#fl_empregador_modal').val(tipoEmpregador);
                $('#ds_cnpj_modal').val(cnpj);
                $('#ds_empregador_modal').val(empregador);
                $('#fl_cargo_modal').val(tipoCargo);
                $('#dt_admissao_modal').val(dtAdmissao.substring(0, 10));
                $('#dt_demissao_modal').val(dtDemissao.substring(0, 10));
                $('#index').val(index);
            });

            const fv4 = FormValidation.formValidation(
                document.getElementById('formModal'),
                {
                    fields: {
                        fl_empregador_modal: {
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
                        ds_cnpj_modal: {
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
                        ds_empregador_modal: {
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
                        fl_cargo_modal: {
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
                        dt_admissao_modal: {
                            format: 'YYYY/MM/DD',
                            message: 'Data obrigatório',
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap(),
                    },
                }
            );

            $('#editButton').on('click', function () {
                fv4.validate().then(function (status) {
                    if (status === 'Valid') {
                        FormValidation.utils.fetch(`previdencia/data/update`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            params: {
                                id: $('#id_modal').val(),
                                fl_empregador: $('#fl_empregador_modal').val(),
                                ds_cnpj: $('#ds_cnpj_modal').val(),
                                ds_empregador: $('#ds_empregador_modal').val(),
                                fl_cargo: $('#fl_cargo_modal').val(),
                                dt_admissao: $('#dt_admissao_modal').val(),
                                dt_demissao: $('#dt_demissao_modal').val(),
                                index: $('#index').val(),
                            },
                        }).then(function (response) {
                            const rowIndex = response.index;

                            $(`[data-row-index=${rowIndex}]`).find("[data-name='prev.fl_empregabdor']").html(response.fl_empregador);
                            $(`[data-row-index=${rowIndex}]`).find("[data-name='prev.cnpj']").html(response.ds_cnpj);
                            $(`[data-row-index=${rowIndex}]`).find("[data-name='prev.empregador']").html(response.ds_empregador);
                            $(`[data-row-index=${rowIndex}]`).find("[data-name='prev.cargo']").html(response.fl_cargo);
                            $(`[data-row-index=${rowIndex}]`).find("[data-name='prev.admissao']").html(response.dt_admissao);
                            $(`[data-row-index=${rowIndex}]`).find("[data-name='prev.demissao']").html(response.dt_demissao);

                            toastr.success('Alterado com Sucesso!')
                            $('#prevModal').modal('hide');
                            console.log(response)
                        }, error => {
                            console.log('error: não atualizado')
                        });
                    }
                });
            });
        });
    </script>
@endpush
