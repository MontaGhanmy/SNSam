<?php

namespace App\Http\Controllers;

use App\Page;
use App\Message;
use Illuminate\Http\Request;
use Validator;

class PageController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|max:255',
            'password' => 'required'
        ]);
    }
    public function invoke(Request $request, $slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
        $menu = nova_get_menus()->first()['menuItems'];

        return view('page', compact('page', 'menu'));
    }
    public function getWebinar(Request $request)
    {
        $menu = nova_get_menus()->first()['menuItems'];
        $messages = Message::orderBy('created_at', 'ASC')->get();
        return view('webinarvideo', compact(['menu', 'messages']));
    }
}
