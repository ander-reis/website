<?php

namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;
use Website\Models\Home;
use Website\Models\Noticias;
use Website\Models\OwlCarousel;
use Website\Models\Slider;
use Website\Models\Intro;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::slider();
        $noticias = Home::get();
        $intro = Intro::intro();

        $home = 1;

        if($home === 1){
            $layout = 'layout-1';
        } elseif ($home === 2) {
            $layout = 'layout-2';
        }

        return view("website.home-layouts.$layout.index", compact('intro', 'sliders', 'noticias'));
    }
}
