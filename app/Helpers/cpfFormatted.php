<?php
if (!function_exists('cpfFormatted')) {
    /**
     * coloca mascara, $cpf === 11, retira mascara, $cpf === 14
     *
     * @param $cpf
     * @return string|string[]|null
     */
    function cpfFormatted($cpf)
    {
        if (strlen($cpf) === 14) {
            return preg_replace("/[^0-9]/", "", $cpf);
        } else if (strlen($cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
        }
    }
}
