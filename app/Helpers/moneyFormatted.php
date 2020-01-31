<?php
if (!function_exists('moneyFormatted')) {
    /**
     * formata moeda no formato R$ 0.000,00
     *
     * @param $money
     * @return string
     */
    function moneyFormatted($money)
    {
        return number_format($money, 2, ',', '.');
    }
}
