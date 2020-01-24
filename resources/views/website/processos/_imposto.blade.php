<hr class="line-red">
<h5>Imposto de Renda</h5>

<div class="btn-group btn-group-sm mb-3" role="group" aria-label="Clique num ano">
    @foreach($ano as $item)
        <a href="{{ route('processos.imposto', ['ano' => $item->jur_pfi_ds_ano, 'pasta' => $pasta, null]) }}" class="btn btn-outline-secondary" target="_blank">{{ $item->jur_pfi_ds_ano }}</a>
    @endforeach
</div>
