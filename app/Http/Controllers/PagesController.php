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

        return view('menu.notindex', compact('menu', 'bahanmenu'));
    } 

    public function verifikasi($id)
    {
        $menu = Menu::find($id);
        $menu->update([
        	'verifikasi' => 1,
        ]);

        return redirect()->route('menu.index')->with('message', ['type' => 'success', 'text' => 'Menu terlah disetujui.']);
    } 
}