@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Relação de Escolas</h1>

            {{ Breadcrumbs::render('relacao-escolas') }}

{{--            <div class="btn-group btn-group-toggle" data-toggle="buttons">--}}
{{--                <label class="btn btn-secondary active">--}}
{{--                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Educação Infantil--}}
{{--                </label>--}}
{{--                <label class="btn btn-secondary">--}}
{{--                    <input type="radio" name="options" id="option2" autocomplete="off"> Ensino Fundamental (1ª à 5ª--}}
{{--                    série)--}}
{{--                </label>--}}
{{--                <label class="btn btn-secondary">--}}
{{--                    <input type="radio" name="options" id="option3" autocomplete="off"> Ensino Fundamental (6ª à 9ª--}}
{{--                    série)--}}
{{--                </label>--}}
{{--                <label class="btn btn-secondary">--}}
{{--                    <input type="radio" name="options" id="option4" autocomplete="off"> Ensino Médio--}}
{{--                </label>--}}
{{--                <label class="btn btn-secondary">--}}
{{--                    <input type="radio" name="options" id="option5" autocomplete="off"> Ensino Superior--}}
{{--                </label>--}}
{{--                <label class="btn btn-secondary">--}}
{{--                    <input type="radio" name="options" id="option6" autocomplete="off"> Técnico--}}
{{--                </label>--}}
{{--                <label class="btn btn-secondary">--}}
{{--                    <input type="radio" name="options" id="option7" autocomplete="off"> Supletivo--}}
{{--                </label>--}}
{{--                <label class="btn btn-secondary">--}}
{{--                    <input type="radio" name="options" id="option8" autocomplete="off"> Curso Livre--}}
{{--                </label>--}}
{{--            </div>--}}

            <div class="col-lg-12">
                <div class="row">
                    <a class="btn btn-outline-secondary col-sm-12 col-md-3 col-lg-3">Educação Infantil</a>
                    <a class="btn btn-outline-secondary col-sm-12 col-md-3 col-lg-3">Ensino Fundamental (1ª à 5ª série)</a>
                    <a class="btn btn-outline-secondary col-sm-12 col-md-3 col-lg-3">Ensino Fundamental (6ª à 9ª série)</a>
                    <a class="btn btn-outline-secondary col-sm-12 col-md-3 col-lg-3">Ensino Médio</a>
                </div>
            </div>

            <div class="col-lg-12 mt-3">
                <div class="row">
                    <a class="btn btn-outline-secondary col-sm-12 col-md-3 col-lg-3">Ensino Superior</a>
                    <a class="btn btn-outline-secondary col-sm-12 col-md-3 col-lg-3">Técnico</a>
                    <a class="btn btn-outline-secondary col-sm-12 col-md-3 col-lg-3">Supletivo</a>
                    <a class="btn btn-outline-secondary col-sm-12 col-md-3 col-lg-3">Curso Livre</a>
                </div>
            </div>

        </div>
    </div>
@endsection
