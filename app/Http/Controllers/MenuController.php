<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\BahanMenu;
use App\Bahan;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all()->where('verifikasi', '=', 1);
        $bahanmenu = BahanMenu::all();

        return view('menu.index', compact('menu', 'bahanmenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bahan = Bahan::all();

        return view('menu.create', compact('bahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'harga' => 'required|numeric',
            'bahan' => 'required',
            'jumlah_bahan' => 'required|numeric|min:1',
        ]);

        $menu = Menu::create([
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'verifikasi' => 0,
            'status' => 0,
        ]);

        $bahan = $request->input('bahan');
        $jumlah_bahan = $request->input('jumlah_bahan');
        foreach ($bahan as $key => $value) {
            $bahanmenu = new Bahanmenu;
            $bahanmenu->menu()->associate($menu);
            $bahanmenu->bahan_id = $bahan[$key];
            $bahanmenu->jumlah_bahan = $jumlah_bahan[$key];
            $bahanmenu->save();
        }

        return redirect()->route('menu.index')->with('message', ['type' => 'success', 'text' => 'Data berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
