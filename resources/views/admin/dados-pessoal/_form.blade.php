<section>
    <legend>Informações Pessoais</legend>
    <hr>
    @component('admin.dados-pessoal.components._informacoes_pessoal', ['user' => $user, 'materia' => $materia])@endcomponent
</section>

<section>
    <legend>Endereço</legend>
    <hr>
    @component('admin.dados-pessoal.components._endereco')@endcomponent
</section>

<section>
    <legend>Contato</legend>
    <hr>
    @component('admin.dados-pessoal.components._contato')@endcomponent
</section>

@push('mask-script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#cep').mask('00000-000');
            $('#buscar-cep').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ url('/admin/cep') }}",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        cep: $('#cep').val(),
                    },
                    success: function (result) {
                        $('#Endereco').val(result.Logradouro);
                        $('#Bairro').val(result.Bairro);
                        $('#Cidade').val(result.Cidade);
                        $('#UF').val(result.UF);
                    }
                });
            });
        });
    </script>
@endpush
