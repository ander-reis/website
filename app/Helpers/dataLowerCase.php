<?php

if (!function_exists('dataLowerCase')) {
    function dataLowercase($data)
    {
        return mb_strtolower($data);
    }
}
