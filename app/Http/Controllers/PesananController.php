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
        $idp = Pesanan::select('id', 'nama', 'meja_id', 'status', 'pembayaran')->distinct('id')->get();
        $pesanan = Pesanan::all();

        return view('pesanan.index', compact('pesanan', 'idp'));
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
            $pesanan->pembayaran = 0;
            $pesanan->save();

            $bahanmenu = \App\BahanMenu::where('menu_id', $menu[$key])->get();
            foreach ( $bahanmenu as $k => $v) {
                $bahan = \App\Bahan::where('id', $bahanmenu[$k]->bahan_id)->first();
                $bahan->update([
                    'stock' => $bahan->stock - ($bahanmenu[$k]->jumlah_bahan * $jumlah[$key]),
                ]);
            }
        }

        $meja = Meja::where('id', $request->input('meja'));
        $meja->update(['status' => 0]);

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
        $pesanan = Pesanan::find($id);
        $menu = Menu::all()->where('status', 1)->where('verifikasi', 1);
        $meja = Meja::all()->where('status', 1);

        foreach ($menu as $k => $v) {
            $bm = $bahanmenu->where('menu_id', $menu[$k]->id);

            foreach ($bm as $x => $y) {
                $b = $bahan->where('id', $bm[$x]->bahan_id)->first();

                if( (($b->stock - $bm[$x]->jumlah_bahan) < 0) or ($b->tgl_kadaluarsa <= Carbon::now())) {
                    $menu[$k]->update([
                        'status' => 0,
                    ]);
                } else {
                    $menu[$k]->update([
                        'status' => 1,
                    ]); 
                }
            }
        }

        return view('pesanan.edit', compact('pesanan', 'meja', 'menu'));
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
        //..
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
        Meja::where('id', $pesanan->meja_id)->update(['status' => 1]);
        Pesanan::find($id)->delete();
        return redirect()->route('pesanan.index')->with('message', ['type' => 'danger', 'text' => 'Pesanan telah dibatalkan.']);
    }
}
