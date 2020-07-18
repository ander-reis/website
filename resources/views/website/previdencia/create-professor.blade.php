@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            {{ Form::open(['route' => 'previdencia.store.professor', 'id' => 'previdenciaForm']) }}
            @include('website.previdencia._form-step1')
            @if($errors->any())
                <ul class="alert alert-danger my-3">
                    @foreach($errors->all() as $error)
                        <li style="list-style: none">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            {{ Form::close() }}
        </div>
    </div>
@endsection
