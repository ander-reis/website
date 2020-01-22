<?php
if (!function_exists('dataHoraFormatted')) {
    function dataHoraFormatted($date)
    {
        return (new \DateTime($date))->format('d/m/Y H:i');
    }
}
