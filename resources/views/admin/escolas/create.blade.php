@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Escola</h1>

            @component('admin.components._alert_error')
                {{Session::get('error-message')}}
            @endcomponent

            {{ Form::open(['route' => 'admin.escolas.store']) }}

            @include('admin.escolas._form')

            <button type="submit" class="btn btn-primary">Cadastrar</button>

            {{ Form::close() }}

        </div>
    </div>
@endsection()
