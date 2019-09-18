@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9">
            <h2 class="mb-4">Atendimento Eletrônico</h2>
            <div class="mb-5">
                <div class="bg-info rounded p-2">
                    <p>Texto enviado em  <span class="font-weight-bold">{{ dataHoraFormatted($chamado->dt_cadastro) }}</span></p>
                    <p>{{ $chamado->ds_texto }}</p>
                </div>

                <div class="bg-light rounded p-2 mt-4">
                @if($chamado->dt_resposta != NULL)
                    <p>Respondido pelo SinproSP em  <span class="font-weight-bold">{{ dataHoraFormatted($chamado->dt_resposta) }}</span></p>
                    <p>{{ $chamado->ds_texto_resposta }}</p>
                @else
                    <p>O SinproSP ainda não cadastrou uma resposta! Por favor, aguarde mais um pouco.</p>
                @endif
                </div>
            </div>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
