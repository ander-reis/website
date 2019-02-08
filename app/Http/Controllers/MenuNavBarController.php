<?php

namespace Website\Http\Controllers;

use Illuminate\View\View;
use Website\Models\MenuItems;

class MenuNavBarController extends Controller
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        $menuItems = MenuItems::get();
//        $view->with('menuItems', $menuItems);
    }
}
