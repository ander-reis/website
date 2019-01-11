@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">

            @component('admin.components._alert_error')
                {{Session::get('error-message')}}
            @endcomponent

            {{ Form::model($escola, ['route' => ['admin.escolas.update', $escola], 'method' => 'PUT']) }}

            @include('admin.escolas._form')

            <button type="submit" class="btn btn-primary">Editar</button>

            {{ Form::close() }}
        </div>
    </div>
@endsection()