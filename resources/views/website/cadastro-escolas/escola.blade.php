@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Escola</h1>
            {{ Breadcrumbs::render('relacao-escolas.escola', $id_nivel, $nome_breadcrumb) }}
            <div class="card bg-dark">
                <div class="card-header text-light">
                    @empty(!$model->Nome_Fantasia)
                        {{ $model->Nome_Fantasia }}
                    @endempty
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        @empty(!$model->Razao_Social)
                            Razão Social: {{ $model->Razao_Social }}
                        @endempty
                    </li>
                    <li class="list-group-item">
                        @empty(!$model->Endereco)
                            Endereço: {{ $model->Endereco }}
                        @endempty
                        @empty(!$model->Complemento)
                            {{ $model->Complemento }}
                        @endempty
                    </li>
                    <li class="list-group-item">
                        @empty(!$model->Numero)
                            Número: {{ $model->Numero }}
                        @endempty
                    </li>
                    <li class="list-group-item">
                        @empty(!$model->Cidade)
                            Cidade: {{ $model->Cidade }}
                        @endempty
                    </li>
                    <li class="list-group-item">
                        @empty(!$model->CEP)
                            Cep: {{ $model->CEP }}
                        @endempty
                    </li>
                    <li class="list-group-item">
                        @empty(!$model->Telefone1)
                            Telefone: {{ $model->Telefone1 }}
                        @endempty
                        @empty(!$model->Telefone1_Ramal)
                            Ramal: {{ $model->Telefone1_Ramal }}
                        @endempty
                        @empty(!$model->Telefone2)
                            - Telefone 2: {{ $model->Telefone2 }}
                        @endempty
                        @empty(!$model->Telefone2_Ramal)
                            Ramal 2: {{ $model->Telefone2_Ramal }}
                        @endempty
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
