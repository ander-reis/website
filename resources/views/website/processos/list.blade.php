@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Processos Judiciais</h1>

        <div class="alert {{($opcao['option'] === 1) ? 'alert-info' : 'alert-danger'}}">
            <p><span class="font-weight-bold">Nome:&nbsp;</span>{{ $model->first()->Nome }}</p>
            <p><span class="font-weight-bold">CPF:&nbsp;</span>{{ $model->first()->CPF }}</p>
            @if(dataFormatted($model->first()->Data_Aniversario) !== '01/01/1900')
                <p>
                    <span class="font-weight-bold">Nascimento:&nbsp;</span>
                    {{ dataFormatted($model->first()->Data_Aniversario) }}
                </p>
            @endif
            <p><span class="font-weight-bold">Acesso:&nbsp;</span>{{ $opcao['name'] }}</p>
        </div>

        <ul class="list-group">
            @foreach($processos as $processo)
                <li class="list-group-item">
                    <a href="{{ route('processos.select', ['id_processo' => $processo->id_processo]) }}" class="link-active">{{ $processo->ds_processo }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

