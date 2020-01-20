@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Dados Cadastrais</h1>
        <p class="text-danger">{{ $processo->ds_processo ?? null }}</p>

        {{ Form::open(['route' => 'processos.store', 'id' => 'processoForm']) }}

        @component('website.processos._form_inventariante', ['cpf' => $cpf ?? null, 'id_processo' => $id_processo ?? null,'cadastroProfessores' => $cadastroProfessores ?? null])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
@endsection

