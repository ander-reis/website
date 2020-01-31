<div class="alert alert-danger text-center" role="alert">
    <div class="font-weight-bolder">Atenção!</div>
    <div>
        {{ str_replace('@VR_RECEBER', moneyFormatted($message->first()->jur_prs_vr_receber) . " (" . moneyTextFormatted($message->first()->jur_prs_vr_receber) . ")", $message->first()->jur_psi_ds_status) }}
    </div>
</div>
