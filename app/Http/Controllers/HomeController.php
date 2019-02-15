<?php

namespace Website\Http\Controllers;

use Website\Models\Noticias;
use Website\Models\OwlCarousel;
use Website\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticias::noticiasRand();

        $destaque = Noticias::destaque();

        $owlItems = OwlCarousel::all();

        $sliders = Slider::slider();

        return view('website.home-layouts.layout-1.index');
    }
}
