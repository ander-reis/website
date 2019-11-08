@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('curriculos') }}

    <div class="row">
        <div class="col-md-12">
            <h1>Currículo Show {{ $id }}</h1>
    </div>

@endsection
