@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">

            @component('admin.components._alert_error')
                {{Session::get('error-message')}}
            @endcomponent
{{--            {{dd($user[0]['Codigo_Professor'])}}--}}
            {{ Form::model($user, ['route' => ['admin.dados-pessoal.update', \Auth::user()->Codigo_Professor], 'method' => 'PUT' ]) }}

            @include('admin.dados-pessoal._form')

            <button type="submit" class="btn btn-primary btn-lg">Editar</button>

            {{ Form::close() }}
        </div>
    </div>
@endsection()
