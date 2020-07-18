@extends('layouts.website')

@section('content')
    {{ Form::model($model, ['route' => ['previdencia.update.professor', 'id' => $model->id], 'id' => 'previdenciaForm', 'method' => 'PUT']) }}
        @include('website.previdencia._form-step1')
    {{ Form::close() }}
@endsection
