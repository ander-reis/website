<div class="btn-group mt-5" role="group" aria-label="Regiões" id="regiao">
    <a href="{{ route('relacao-escolas.regiao', ['id_nivel' => $id_nivel, 'id_regiao' => '1#escola']) }}" class="{{setActiveClass("relacao-escolas/grupos/nivel/{$id_nivel}/regiao/1")}}btn btn-secondary">Centro</a>
    <a href="{{ route('relacao-escolas.regiao', ['id_nivel' => $id_nivel, 'id_regiao' => '2#escola']) }}" class="{{setActiveClass("relacao-escolas/grupos/nivel/{$id_nivel}/regiao/2")}}btn btn-secondary">Zona Norte</a>
    <a href="{{ route('relacao-escolas.regiao', ['id_nivel' => $id_nivel, 'id_regiao' => '3#escola']) }}" class="{{setActiveClass("relacao-escolas/grupos/nivel/{$id_nivel}/regiao/3")}}btn btn-secondary">Zona Sul</a>
    <a href="{{ route('relacao-escolas.regiao', ['id_nivel' => $id_nivel, 'id_regiao' => '4#escola']) }}" class="{{setActiveClass("relacao-escolas/grupos/nivel/{$id_nivel}/regiao/4")}}btn btn-secondary">Zona Leste</a>
    <a href="{{ route('relacao-escolas.regiao', ['id_nivel' => $id_nivel, 'id_regiao' => '5#escola']) }}" class="{{setActiveClass("relacao-escolas/grupos/nivel/{$id_nivel}/regiao/5")}}btn btn-secondary">Zona Oeste</a>
</div>
