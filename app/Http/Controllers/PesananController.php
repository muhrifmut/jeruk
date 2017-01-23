<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Meja;
use App\Pesanan;
use Carbon;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::all();

        return view('pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all()->where('status', 1)->where('verifikasi', 1);

        $meja = Meja::all()->where('status', 1);

        return view('pesanan.create', compact('menu', 'meja'));
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
            'meja' => 'required|numeric',
            'menu' => 'required',
            'jumlah_menu' => 'required',
        ]);

        $id = strtotime(Carbon\Carbon::now());
        $menu = $request->input('menu');
        $jumlah = $request->input('jumlah_menu');
        foreach ($menu as $key => $value) {
            $pesanan = new Pesanan;
            $pesanan->id = $id;
            $pesanan->nama = $request->input('nama');
            $pesanan->meja_id = $request->input('meja');
            $pesanan->menu_id = $menu[$key];
            $pesanan->jumlah_menu = $jumlah[$key];
            $pesanan->status = 0;
            $pesanan->save();
        }

        return redirect()->route('pesanan.index')->with('message', ['type' => 'success', 'text' => 'Data berhasil ditambahkan!']);
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
