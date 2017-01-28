<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\BahanMenu;
use App\Pesanan;

class PagesController extends Controller
{
	public function notverifikasi()
    {
        $menu = Menu::all()->where('verifikasi', 0);
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

    public function pesananbuat($id)
    {
        $pesanan = Pesanan::where('id', $id);
        $pesanan->update([
            'status' => 1,
        ]);

        foreach ($pesanan as $key => $value) {
            $menu = \App\Menu::where('id', $pesanan[$key]->menu_id);
            foreach ($menu as $k => $v) {
                $bahanmenu = \App\BahanMenu::where('menu_id', $menu[$k]->id);
                foreach ($bahanmenu as $x => $y) {
                    $bahan = \App\Bahan::where('id', $bahanmenu[$x]->bahan_id);
                    \App\Bahan::update([
                        'stock' => $bahan->stock - ($bahanmenu[$x]->jumlah_bahan * $pesanan[$key]->jumlah_menu),
                    ]);
                }
            }
        }

        return redirect()->route('pesanan.index');
    } 

    public function pesananselesai($id)
    {
        $pesanan = Pesanan::where('id', $id);
        $pesanan->update([
        	'status' => 2,
        ]);

        return redirect()->route('pesanan.index');
    } 
}