@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Processos Judiciais</h1>
        <div class="alert alert-info">
            <p><span class="font-weight-bold">Nome:&nbsp;</span>{{ $model->first()->Nome }}</p>
            <p><span class="font-weight-bold">CPF:&nbsp;</span>{{ $model->first()->CPF }}</p>
            <p><span class="font-weight-bold">Nascimento:&nbsp;</span>{{ dataFormatted($model->first()->Data_Aniversario) }}</p>
            <p><span class="font-weight-bold">Acesso:&nbsp;</span>{{ $opcao }}</p>
        </div>
        <div class="mb-5">
            <ul class="list-group">
                @foreach($processos as $item)
                    <li class="list-group-item">
                        <a href="{{ route('processos.edit', ['id' => $item->id_processo]) }}" class="link-active">{{ $item->ds_processo }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        {{--paginacao--}}
        {!! $processos->links() !!}
    </div>
@endsection

