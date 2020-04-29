@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h2 class="mb-4">Reunião virtual do SinproSP</h2>
            <p>Tendo em vista a pandemia e a ordem de evitarem aglomerações a realização de assembleia física tornou-se inviável, o SinproSP irá utilizar da tecnologia para realização de assembleia on-line.</p>

            <p>Para isso, utilizaremos o <a href="https://zoom.us/" target="_blank">zoom</a>.</p>

            <p>Abaixo, algumas instruções de como utilizar o aplicativo.</p>
            <div class="row">
                <div class="card col-12 col-sm-6 col-md-4 p-2 border-0 border-0" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">Caso não tenha o zoom instalado no seu celular ou computador, após clicar no link da reunião, será solicitado a instalação, conforme a sua loja de aplicativos.</p>
                    </div>
                    <img class="card-img-top" src="{{ asset('images/zoom/img1.jpg') }}" alt="Imagem de capa do card">
                </div>
                <div class="card col-12 col-sm-6 col-md-4 p-2 border-0" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">Depois do aplicativo instalado, clique novamente no link da reunião. Se o SinproSP já estiver on-line para a reunião, será necessário informar o seu nome.</p>
                    </div>
                    <img class="card-img-top" src="{{ asset('images/zoom/img2.jpg') }}" alt="Imagem de capa do card">
                </div>
                <div class="card col-12 col-sm-6 col-md-4 p-2 border-0" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">Você entra numa sala de espera, até o que o SinproSP, autorize a sua entrada na reunião.</p>
                    </div>
                    <img class="card-img-top" src="{{ asset('images/zoom/img3.jpg') }}" alt="Imagem de capa do card">
                </div>
                <div class="card col-12 col-sm-6 col-md-4 p-5 border-0" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">Caso necessário, habilite o seu áudio, clicando na primeira opção (Incluir áudio).</p>
                    </div>
                    <img class="card-img-top" src="{{ asset('images/zoom/img4.jpg') }}" alt="Imagem de capa do card">
                </div>
                <div class="card col-12 col-sm-6 col-md-4 p-5 border-0" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">Observe que tanto o microfone quanto a camêra estão desligados. Clique neles e os ative.</p>
                    </div>
                    <img class="card-img-top" src="{{ asset('images/zoom/img5.jpg') }}" alt="Imagem de capa do card">
                </div>
                <div class="card col-12 col-sm-6 col-md-4 p-5 border-0" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">No momento em que o diretor do SinproSP for falar, ele irá bloquear o microfone de todos os participantes. Se alguém desejar falar, clique nos 3 pontinhos (Mais) e selecione "Levantar Mão". Assim que possível, o o seu microfone será liberado.</p>
                    </div>
                    <img class="card-img-top" src="{{ asset('images/zoom/img6.jpg') }}" alt="Imagem de capa do card">
                </div>
            </div>
        </div>
    </div>
@endsection
