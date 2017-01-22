<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\BahanMenu;

class PagesController extends Controller
{
	public function notverifikasi()
    {
        $menu = Menu::all()->where('verifikasi', '=', 0);
        $bahanmenu = BahanMenu::all();

        return view('menu.index', compact('menu', 'bahanmenu'));
    } 
}
