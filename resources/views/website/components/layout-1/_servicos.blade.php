<div class="row">
    <div class="col-md-12 mt-2">
        <div class="row">

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'assistencia-juridica']),
                'icon' => '<i class="fas fa-balance-scale fa-3x text-dark"></i>',
                'class' => 'servicos1',
                'title' => 'ATENDIMENTO<br/>JURÍDICO'
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'assistencia-previdenciaria']),
                'icon' => '<i class="fas fa-tasks fa-3x text-dark"></i>',
                'class' => 'servicos1',
                'title' => 'ATENDIMENTO<br/>PREVIDENCIÁRIO'
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'atendimento-medico']),
                'icon' => '<i class="fas fa-user-md fa-3x text-dark"></i>',
                'class' => 'servicos1',
                'title' => 'ATENDIMENTO<br/>MÉDICO'
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('paginas-principais', ['url-pagina' => 'colonia']),
                'icon' => '<i class="fas fa-umbrella-beach fa-3x text-dark"></i>',
                'class' => 'servicos1',
                'title' => 'COLÔNIA<br/>DE FÉRIAS'
            ])
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('fono.index'),
                'icon' => '<i class="fab fa-creative-commons-sampling fa-3x text-dark"></i>',
                'class' => 'servicos2',
                'title' => 'FONOAUDIOLOGIA'
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('fono.index'),
                'icon' => '<i class="fas fa-notes-medical fa-3x text-dark"></i>',
                'class' => 'servicos2',
                'title' => 'PLANO DE SAÚDE'
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('fono.index'),
                'icon' => '<i class="fas fa-handshake fa-3x text-dark"></i>',
                'class' => 'servicos2',
                'title' => 'CONVÊNIOS<br/>E PARCERIAS'
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('fono.index'),
                'icon' => '<i class="fas fa-mobile-alt fa-3x text-dark"></i>',
                'class' => 'servicos2',
                'title' => 'APLICATIVO<br/>DO SINPROSP'
            ])

        </div>
    </div>

    <div class="col-md-12">
        <div class="row">

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('fono.index'),
                'icon' => '<i class="fas fa-comments fa-3x text-dark"></i>',
                'class' => 'servicos3',
                'title' => 'ATENDIMENTO<br/>ELETRÔNICO'
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('fono.index'),
                'icon' => '<i class="fas fa-envelope-open-text fa-3x text-dark"></i>',
                'class' => 'servicos3',
                'title' => 'BOLETIM<br/>DO SINPRO'
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('fono.index'),
                'icon' => '<i class="fas fa-folder-plus fa-3x text-dark"></i>',
                'class' => 'servicos3',
                'title' => 'ACERVO'
            ])

            @include('website.components.layout-1._icons_servicos', [
                'route' => route('fono.index'),
                'icon' => '<i class="fas fa-copy fa-3x text-dark"></i>',
                'class' => 'servicos3',
                'title' => 'HOMOLOGAÇÃO'
            ])

        </div>
    </div>
</div>
