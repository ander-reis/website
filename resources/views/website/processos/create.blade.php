@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Dados Cadastrais</h1>

        {{ Form::open(['route' => 'processos.store', 'id' => 'processoForm']) }}

        @component('website.processos._form', ['cpf' => $data['ds_cpf'], 'id_processo' => $data['id_processo']])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
@endsection

