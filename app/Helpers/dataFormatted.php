<?php
if(!function_exists('dataFormatted')){
    function dataFormatted($date){
        return (new \DateTime($date))->format('d/m/Y');
    }
}