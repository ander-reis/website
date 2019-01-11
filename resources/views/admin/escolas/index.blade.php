@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Escolas</h1>

            @component('admin.components._alert_error')
                {{Session::get('error-message')}}
            @endcomponent

            <p>
                <a href="{{ route('admin.escolas.create') }}" class="btn btn-primary mr-2 mt-2 mb-2">Cadastrar Escola</a>
            </p>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Escola</th>
                    <th class="text-center">Endereço</th>
                    <th class="text-center">Telefone</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody>
                @foreach($escolas as $escola)
                    <tr>
                        <td>{{ $escola->id }}</td>
                        <td>{{ $escola->escola }}</td>
                        <td>{{ $escola->endereco }}</td>
                        <td>{{ $escola->telefone }}</td>
                        <td class="text-center">
                            <a class="text-dark" href="{{ route('admin.escolas.edit', ['escola' => $escola->id]) }}">
                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteEscolaModal" data-whatever="{{ $escola->id }}">
                                <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @component('admin.escolas._modal_delete', [$escolas])
    @endcomponent
@endsection()