<?php

namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;
use Website\Models\Home;
use Website\Models\Noticias;
use Website\Models\OwlCarousel;
use Website\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
//        $noticias = Noticias::noticiasRand();

//        $destaque = Noticias::destaque();

//        $owlItems = OwlCarousel::all();

        $sliders = Slider::slider();
        $noticias = Home::get();

        $home = 1;

        if($home === 1){
            $layout = 'layout-1';
        } elseif ($home === 2) {
            $layout = 'layout-2';
        }

        return view("website.home-layouts.$layout.index", compact('sliders', 'noticias'));
    }
}
