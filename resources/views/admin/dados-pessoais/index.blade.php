@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            {{--@component('admin.components._alert_error')--}}
            {{--{{Session::get('error-message')}}--}}
            {{--@endcomponent--}}

            {{ Form::model($user, ['route' => ['admin.dados-pessoais.update', \Auth::user()->id], 'method' => 'PUT' ]) }}
            {{--{{ Form::open(['route' => 'admin.dados-pessoais.index']) }}--}}

            @include('admin.dados-pessoais._form')

            <button type="submit" class="btn btn-primary">Editar</button>

            {{ Form::close() }}
        </div>
    </div>
@endsection()