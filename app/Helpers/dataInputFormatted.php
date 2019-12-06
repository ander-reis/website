<?php
if (!function_exists('dataInputFormatted')) {
    function dataInputFormatted($date)
    {
        return (new \DateTime($date))->format('Y-m-d');
    }
}
