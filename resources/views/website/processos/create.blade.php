@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Dados Cadastrais</h1>
        <p class="text-info">{{ $processo->ds_processo ?? null }}</p>

        @if($message->first()->jur_prs_nr_pasta === '053/2010')
            <a href="#" class="link-active" data-toggle="modal" data-target="#info">Veja aqui as informações sobre este processo</a>
        @endif

        @empty(!$message)
            @component('website.processos._message', ['message' => $message])@endcomponent
        @endempty

        {{ Form::open(['route' => 'processos.store', 'id' => 'processoForm']) }}

        @component('website.processos._form_inventariante', ['cpf' => $cpf ?? null, 'id_processo' => $id_processo ?? null,'cadastroProfessores' => $cadastroProfessores ?? null])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}

        @if($message->first()->jur_prs_nr_pasta === '053/2010')
            @component('website.processos._info_modal')@endcomponent
        @endif
    </div>
@endsection

