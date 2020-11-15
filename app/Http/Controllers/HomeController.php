<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = nova_get_menus()->first()['menuItems'];
        $latest = PostController::getLatest();
        $views = PostController::getByViews();
        $events = PostController::getEvents();
        return view('home', [
            'latest' => $latest,
            'views' => $views,
            'events' => $events,
            'menu'  => $menu,
        ]);
    }
    public function contact()
    {
        $menu = nova_get_menus()->first()['menuItems'];
        return view('contact', compact('menu'));
    }
}
