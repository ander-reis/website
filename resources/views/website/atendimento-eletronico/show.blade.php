@extends('layouts.website')

@section('robots')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9">
            <h2 class="mb-4">Atendimento Eletrônico</h2>
            <div class="mb-5">
                <div class="bg-info rounded p-2">
                    <p>Texto enviado em  <span class="font-weight-bold">{{ dataHoraFormatted($chamado->dt_cadastro) }}</span></p>
                    <p>{!! nl2br($chamado->ds_texto) !!}</p>
                </div>

                <div class="bg-light rounded p-2 mt-4">
                @if($chamado->dt_resposta != NULL)
                    <p>Respondido pelo <span class="text-warning font-weight-bold">SinproSP</span> em  <span class="font-weight-bold">{{ dataHoraFormatted($chamado->dt_resposta) }}</span></p>
                    <p>{!! nl2br($chamado->ds_texto_resposta) !!}</p>
                @else
                    <p>O SinproSP ainda não cadastrou uma resposta! Por favor, aguarde mais um pouco.</p>
                @endif
                </div>

                @if($chamado->dt_rating == NULL && $chamado->dt_resposta != NULL)
                    <div class="rounded p-2 mt-4 border border-danger">
                        <p class="font-weight-bold">AVALIE ESTE ATENDIMENTO</p>
                        
                        {{ Form::open(['route' => 'atendimento-eletronico.rating']) }}

                        @component('website.form-components._form_group',['field' => 'txtEmail'])
                        {{ Form::label('txtEmail', 'Confirme seu e-mail:', ['class' => 'control-label']) }}
                        {{ Form::email('txtEmail', null, ['class' => 'form-control', 'maxlength' => 80, 'placeholder' => 'Informe o e-mail utilizado neste atendimento']) }}
                        @endcomponent
                        
                        <p>1) De modo geral, como você avalia a qualidade deste atendimento?</p> 

                        <div class="rating">
                            <label for="rating11" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating11" name="rating1" value="1" class="form-control" {{ (old('rating1') == '1') ? 'checked' : ''}}>

                            <label for="rating12" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating12" name="rating1" value="2" class="form-control" {{ (old('rating1') == '2') ? 'checked' : ''}}>

                            <label for="rating13" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating13" name="rating1" value="3" class="form-control" {{ (old('rating1') == '3') ? 'checked' : ''}}>

                            <label for="rating14" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating14" name="rating1" value="4" class="form-control" {{ (old('rating1') == '4') ? 'checked' : ''}}>

                            <label for="rating15" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating15" name="rating1" value="5" class="form-control" {{ (old('rating1') == '5') ? 'checked' : ''}}>
                        </div>

                        <p>2) Nossos atendentes conseguiram captar adequadamente suas dúvidas e preocupações?</p>

                        <div class="rating">
                            <label for="rating21" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating21" name="rating2" value="1" class="form-control" {{ (old('rating2') == '1') ? 'checked' : ''}}>

                            <label for="rating22" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating22" name="rating2" value="2" class="form-control" {{ (old('rating2') == '2') ? 'checked' : ''}}>

                            <label for="rating23" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating23" name="rating2" value="3" class="form-control" {{ (old('rating2') == '3') ? 'checked' : ''}}>

                            <label for="rating24" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating24" name="rating2" value="4" class="form-control" {{ (old('rating2') == '4') ? 'checked' : ''}}>

                            <label for="rating25" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating25" name="rating2" value="5" class="form-control" {{ (old('rating2') == '5') ? 'checked' : ''}}>
                        </div>

                        <p>3) Quanto tempo foi necessário esperar para que suas dúvidas e problemas fossem resolvidos?</p>

                        <div class="rating">
                            <label for="rating31" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating31" name="rating3" value="1" class="form-control" {{ (old('rating3') == '1') ? 'checked' : ''}}>

                            <label for="rating32" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating32" name="rating3" value="2" class="form-control" {{ (old('rating3') == '2') ? 'checked' : ''}}>

                            <label for="rating33" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating33" name="rating3" value="3" class="form-control" {{ (old('rating3') == '3') ? 'checked' : ''}}>

                            <label for="rating34" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating34" name="rating3" value="4" class="form-control" {{ (old('rating3') == '4') ? 'checked' : ''}}>

                            <label for="rating35" class="control-label"><i class="fa"></i></label>
                            <input type="radio" id="rating35" name="rating3" value="5" class="form-control" {{ (old('rating3') == '5') ? 'checked' : ''}}>
                        </div>

                        <div>
                            {{ Form::hidden('chamado', Request::route('id')) }}
                            {{ Form::submit('Cadastrar avaliação',['class' => 'btn btn-dark']) }}
                        </div>

                        {{ Form::close() }}
                    </div>
                @endif

            </div>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
