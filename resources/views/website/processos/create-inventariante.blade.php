@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Dados Cadastrais</h1>

        {{ Form::open(['route' => 'processos.store', 'id' => 'processoForm']) }}

        @component('website.processos._form_inventariante', ['cpf' => $cpf, 'id_processo' => $id_processo, 'opcao' => $opcao])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
@endsection

