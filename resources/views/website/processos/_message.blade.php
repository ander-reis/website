<div class="alert alert-danger text-center" role="alert">
    <div class="font-weight-bolder">Atenção!</div>
    <div>

       {!! str_replace(
                '@VR_RECEBER',
                moneyFormatted($message->first()->jur_prs_vr_receber) . " (" . moneyTextFormatted($message->first()->jur_prs_vr_receber) . ")",
                str_replace(
                    '@VR_PARCELA1',
                    moneyFormatted($message->first()->jur_prs_vr_parcela1),
                    str_replace(
                        '@VR_PARCELA2',
                        moneyFormatted($message->first()->jur_prs_vr_parcela2),
                        $message->first()->jur_psi_ds_status
                    )
                )
            )
        !!}

    </div>
</div>
