<section>
    <legend>Informações Pessoais</legend>
    <hr>
    @component('admin.dados-pessoais.components._informacoes_pessoais', ['user' => $user])@endcomponent
</section>

<section>
    <legend>Endereço</legend>
    <hr>
    @component('admin.dados-pessoais.components._endereco')@endcomponent
</section>

<section>
    <legend>Contato</legend>
    <hr>
    @component('admin.dados-pessoais.components._contato')@endcomponent
</section>

@push('mask-script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#ds_cpf').mask('000.000.000-00');
            $('#ds_cep').mask('00000-000');
        });
    </script>
@endpush