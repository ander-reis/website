<div class="row">
    <div class="col-md-12 mt-2">
        <div class="row">

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'assistencia-juridica']),
                'icon' => '<i class="fas fa-balance-scale fa-3x text-dark"></i>',
                'class' => 'servicos1',
                'title' => 'ATENDIMENTO<br/>JURÍDICO',
                'target' => ""
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'assistencia-previdenciaria']),
                'icon' => '<i class="fas fa-tasks fa-3x text-dark"></i>',
                'class' => 'servicos1',
                'title' => 'ATENDIMENTO<br/>PREVIDENCIÁRIO',
                'target' => ""
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('fono.index'),
                'icon' => '<i class="fab fa-creative-commons-sampling fa-3x text-dark"></i>',
                'class' => 'servicos1',
                'title' => 'FONOAUDIOLOGIA',
                'target' => ""
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'colonia']),
                'icon' => '<i class="fas fa-umbrella-beach fa-3x text-dark"></i>',
                'class' => 'servicos1',
                'title' => 'COLÔNIA<br/>DE FÉRIAS',
                'target' => ""
            ])
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">

           @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'plano-saude']),
                'icon' => '<i class="fas fa-notes-medical fa-3x text-dark"></i>',
                'class' => 'servicos2',
                'title' => 'PLANO DE SAÚDE',
                'target' => "_blank"
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => 'http://www1.sinprosp.org.br/convenios.asp',
                'icon' => '<i class="fas fa-handshake fa-3x text-dark"></i>',
                'class' => 'servicos2',
                'title' => 'CONVÊNIOS<br/>E PARCERIAS',
                'target' => "_blank"
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'homologacao']),
                'icon' => '<i class="fas fa-copy fa-3x text-dark"></i>',
                'class' => 'servicos2',
                'title' => 'HOMOLOGAÇÃO',
                'target' => ""
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => 'https://www.youtube.com/user/SINPROSP',
                'icon' => '<i class="fas fa-folder-plus fa-3x text-dark"></i>',
                'class' => 'servicos2',
                'title' => 'ACERVO',
                'target' => "_blank"
            ])
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('atendimento-eletronico.index'),
                'icon' => '<i class="fas fa-comments fa-3x text-dark"></i>',
                'class' => 'servicos3',
                'title' => 'ATENDIMENTO<br/>ELETRÔNICO',
                'target' => ""
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('boletim.index'),
                'icon' => '<i class="fas fa-envelope-open-text fa-3x text-dark"></i>',
                'class' => 'servicos3',
                'title' => 'BOLETIM<br/>DO SINPROSP',
                'target' => ""
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'app']),
                'icon' => '<i class="fas fa-mobile-alt fa-3x text-dark"></i>',
                'class' => 'servicos3',
                'title' => 'APLICATIVO<br/>DO SINPROSP',
                'target' => ""
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'whatsapp']),
                'icon' => '<i class="fab fa-whatsapp fa-3x text-dark"></i>',
                'class' => 'servicos3',
                'title' => 'WHATSAPP',
                'target' => ""
            ])
        </div>
    </div>
</div>
