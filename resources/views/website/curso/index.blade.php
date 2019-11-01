@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('cursos.index') }}

    <div class="row">
        <div class="col-md-12">
            <section>
                <div class="alert alert-dark" role="alert">
                    <h5>{!! $model_cursos->txt_titulo !!}</h5>
                </div>
                {!! $model_cursos->ds_texto !!}
                <p class="mt-4 mb-4">
                    <a href="{{ route('cursos.programacao') }}" class="btn btn-outline-dark">Conheça a agenda dos
                        cursos</a>
                </p>
            </section>
            <section>
                <div class="alert alert-dark" role="alert">
                    <h5>{!! $model_congresso->txt_titulo !!}</h5>
                </div>
                {!! $model_congresso->ds_texto !!}
            </section>
        </div>
    </div>
@endsection
