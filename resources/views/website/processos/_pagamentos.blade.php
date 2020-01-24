<hr class="line-red">
<h5>Histórico de Pagamentos</h5>

<div class="btn-group btn-group-sm btn-group-toggle mb-3" data-toggle="buttons" role="group" aria-label="Selecione um Ano">
    @foreach($ano as $key => $item)
        @if($key === 0)
            <label class="btn btn-outline-secondary active">
                <input type="radio" name="pagamento" id="{{ $item->ano }}" checked>{{ $item->ano }}
            </label>
        @else
            <label class="btn btn-outline-secondary">
                <input type="radio" name="pagamento" id="{{ $item->ano }}">{{ $item->ano }}
            </label>
        @endif
    @endforeach
</div>

{{ Form::hidden('pasta', $pasta, ['id' => 'pasta']) }}

<section id="flip-scroll">
    <table id="pagamentos" class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Parcela</th>
            <th scope="col">Valor</th>
            <th scope="col">Data Vencimento</th>
            <th scope="col">Data Pagamento</th>
            <th scope="col">Pagamento</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pagamentos as $item)
            <tr>
                <td>{{ $item['jur_pcf_nr_parcela'] }}</td>
                <td>{{ $item['jur_pcf_vl_total'] }}</td>
                <td>{{ $item['jur_pcf_dt_vencimento'] }}</td>
                <td>{{ $item['jur_pcf_dt_pagamento'] }}</td>
                <td>{{ $item['jur_pcf_pagamento'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('website.components.layout-1._preloader-circulo')
</section>
<div id="total" class="mt-3 mb-3">
    <span>Total Pago <strong class="text-danger">{{ $total }}</strong></span>
</div>
@push('pagamento-script')
    <script type="text/javascript">
        $("input[name='pagamento']").change((element) => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/processos/pagamento') }}",
                method: 'post',
                dataType: 'json',
                data: {
                    ano: element.target.id,
                    pasta: $('#pasta').val()
                },
                beforeSend: () => {
                    $('#preloader-circulo').show();
                    $('#pagamentos > tbody > tr').remove();
                    $('#total > span').remove()
                },
                success: function (data) {
                    let tr = data.data;
                    let table;
                    for (let i in tr) {
                        table = `<tr>
                                    <td>${tr[i].jur_pcf_nr_parcela}</td>
                                    <td>${tr[i].jur_pcf_vl_total}</td>
                                    <td>${tr[i].jur_pcf_dt_vencimento}</td>
                                    <td>${tr[i].jur_pcf_dt_pagamento}</td>
                                    <td>${tr[i].jur_pcf_pagamento}</td>
                                </tr>`;
                        $('#pagamentos > tbody').append(table);
                    }

                    $('#total').append(`<span>Total Pago <strong class="text-danger">${data.total}</strong></span>`);

                    if (data.data.length === 0) {
                        table = '<h6>Não foi encontrado nenhum resultado!</h6>';
                        $('#pagamentos').append(table);
                    }

                    // loading stop
                    $(document).ajaxComplete(() => {
                        $('#preloader-circulo').hide();
                    });
                },
                error: function (error) {
                    if(error){
                        $('#preloader-circulo').hide();
                    }
                }
            });
        });
    </script>
@endpush
