@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h1>Whatsapp</h1>

            <div class="mt-3 mb-3">
                {{ link_to_route('whatsapp.index', $title = 'Pesquisar', $parameters = [], $attributes = ['class' => 'btn btn-dark']) }}
            </div>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    @php
                        toastr()->error("Erro: {$error}!");
                    @endphp
                @endforeach
            @endif

            {{ Form::open(['route' => 'whatsapp.store', 'id' => 'whatsappForm']) }}
            @include('website.whatsapp._form')
            {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
