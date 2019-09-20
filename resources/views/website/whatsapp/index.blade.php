@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9">
            <h2 class="mb-4">Whatsapp</h2>
            <div class="mb-5">
                <p>Você pode fazer parte do grupo do Whatsapp do SinproSP.</p>

                <p>Para isso, clique no botão abaixo.</p>

                <p>Não se esqueça de adicionar o Whatsapp do SinproSP na sua lista de contatos.</p>

                <a href="https://api.whatsapp.com/send?phone=5511952781230&text=Olá,%20quero%20me%20inscrever%20no%20Whatsapp%20do%20SinproSP.%0DMeu%20nome%20é%20" class="btn btn-success btn-lg  btn-lg btn-block mt-5" role="button" aria-pressed="true" target="_blank">Enviar mensagem Whatsapp</a>
            </div>


        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
