@extends('layouts.website')

@section('content')
    <h1>{{ $title }} Dados Profissionais</h1>
    @if($errors->any())
        <ul class="alert alert-danger my-3">
            @foreach($errors->all() as $error)
                <li style="list-style: none">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {{ Form::model($model, ['route' => [
    'previdencia.update.data',
    'id_professor' => $id_professor,
    'id' => $model->id
    ], 'id' => 'previdenciaForm', 'method' => 'PUT']) }}
    @include('website.previdencia._form-step2-edit')
    {{ Form::close() }}
@endsection
