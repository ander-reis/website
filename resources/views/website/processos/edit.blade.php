
@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Processos Judiciais</h1>

        <div>
            <p>CPF: {{ $model->first()->CPF }}</p>
            <p>Data de Nascimento: {{ dataFormatted($model->first()->Data_Aniversario) }}</p>
        </div>
{{--        {{ Form::open(['route' => 'processos.update', 'id' => $processos]) }}--}}

        {{ Form::select('id_processo', $processos->pluck('ds_processo', 'id_processo'), null, ['placeholder' => 'Selecione o Processo', 'class' => 'form-control']) }}
        {{ Form::submit('Prosseguir', ['class' => 'btn btn-success']) }}

        @foreach($processos as $item)
            <p>{{ $item->ds_processo }}</p>
            <a href="{{ route('processos.show', ['id' => $item->id_processo]) }}">Abrir</a>
        @endforeach

{{--        {{ Form::close() }}--}}

    </div>
@endsection

