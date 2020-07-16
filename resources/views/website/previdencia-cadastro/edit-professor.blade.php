@extends('layouts.website')

@section('content')
    {{ Form::model($model, ['route' => ['previdencia-cadastro.update.professor', 'id' => $model->id], 'id' => 'previdenciaForm', 'method' => 'PUT']) }}
        @include('website.previdencia-cadastro._form-step1')
    {{ Form::close() }}
@endsection
