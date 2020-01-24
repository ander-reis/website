@extends('layouts.imposto')

@section('content')
    <div class="container">
        <p>Prezado professor <strong>{{ $model->Nome ?? null }}</strong></p>
        <p>Informamos os procedimentos para o preenchimento de suia declaração de imposto de renda referente ao
            processo {{ $model->jur_prc_nr_processo ?? null }} conta a {{ $model->Razao_Social ?? null }},
            CNPJ {{ $model->jur_fic_cd_cnpj ?? null }}, ano base {{ $model->jur_pfi_ds_ano }}.</p>
        <p>O tratamento tributário de diferenças salariais recebidas acumuladamente por força de decisão judicial será feito na ficha de:</p>
        <p><strong>Rendimentos Tributáveis de Pessoa Jurídica Recebidos Acumuladamente pelo Titular</strong></p>
        <ol>
            <li>Escolha a opção novo</li>
            <li>Assinale a opção da forma de tributação</li>
            <span><strong>(x) Exclusiva na fonte</strong></span>
            <li>CPF/CNPJ da fonte pagadora</li>
            <span><strong>{{ $model->jur_fic_cd_cnpj }}</strong></span>
            <li>Nome da fonte pagadora</li>
            <span><strong>{{ $model->Razao_Social }}</strong></span>
            <li>Redimentos recebidos</li>
            <span><strong>{{ moneyFormatted($model->jur_pfi_vl_rendimento) }}</strong></span>
            <li>Contribuição previdênciária oficial</li>
            <span><strong>{{ moneyFormatted($model->jur_pfi_vl_inss) }}</strong></span>
            <li>Pensão alimentícia</li>
            <span><strong>Deixar em branco</strong></span>
            <li>??? Imposto retido na fonte</li>
            <span><strong>??? {{ moneyFormatted($model->jur_pfi_vl_inss) }}</strong></span>
            <li>Mês de recebimento</li>
            <span><strong>??? {{ moneyFormatted($model->jur_pfi_vl_inss) }}</strong></span>
            <li>Número de meses</li>
            <span><strong>{{ moneyFormatted($model->jur_pfi_nr_parcela) }}</strong></span>
            <li>Clique em ok</li>
        </ol>
    </div>
@endsection
