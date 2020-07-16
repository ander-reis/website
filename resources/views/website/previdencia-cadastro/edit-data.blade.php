@extends('layouts.website')

@section('content')
    <h1>{{ $title }} Dados Profissionais</h1>

    {{ Form::model($model, ['route' => ['previdencia-cadastro.update.data', 'id_professor' => $id_professor, 'id' => $model->id], 'id' => 'previdenciaForm', 'method' => 'PUT']) }}
        @include('website.previdencia-cadastro._form-step2-edit')
    {{ Form::close() }}
@endsection
