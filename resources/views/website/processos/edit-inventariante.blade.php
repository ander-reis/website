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

        {{ Form::model($model, ['route' => ['processos.update.inventariante', $cadastroProfessores->Codigo_Professor, $model->id_cadastro], 'method' => 'PUT', 'id' => 'processoForm']) }}

        @component('website.processos._form_inventariante', ['model' => $model ?? null, 'cpf' => $cpf ?? null, 'opcao' => $opcao ?? null, 'cadastroProfessores' => $cadastroProfessores ?? null, 'id_processo' => $id_processo ?? null])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::submit('Dados atualizados', ['class' => 'btn btn-info']) }}

        {{ Form::close() }}

        @empty(!$anoPagamento->first())
            @component('website.processos._pagamentos', ['ano' => $anoPagamento, 'pagamentos' => $pagamentos, 'total' => $total, 'pasta' => $processo->nr_pasta])@endcomponent
        @endempty

        @empty(!$anoImposto->first())
            @component('website.processos._imposto', ['ano' => $anoImposto, 'pasta' => $processo->nr_pasta])@endcomponent
        @endempty

        @if($message->first()->jur_prs_nr_pasta === '053/2010')
            @component('website.processos._info_modal')@endcomponent
        @endif
    </div>
@endsection
