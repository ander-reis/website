<?php

if(!function_exists('setActiveClass')){
    function setActiveClass($path){
        return Request::is($path . '*') ? 'active ' :  '';
    }
}
