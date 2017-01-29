<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Meja;

class PembayaranController extends Controller
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

        return view('pembayaran.index', compact('pesanan', 'idp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
        $dataharga = Pesanan::where('id', $id)->select('menu_id', 'jumlah_menu')->get();
        $total_harga = 0;
        foreach ($dataharga as $dh) {
            $total_harga = $total_harga + ($dh->menu->harga * $dh->jumlah_menu);
        }

        return view('pembayaran.edit', compact('pesanan', 'total_harga'));
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
        \App\Pesanan::where('id', $id)->update([
            'pembayaran' => 1,
        ]);

        \App\Transaksi::create([
            'pegawai_id' => \Auth::user()->id,
            'pesanan_id' => $id,
            'total_harga' => $request->input('total_harga'),
        ]);
        
        $pesanan = Pesanan::find($id);
        Meja::where('id', $pesanan->meja_id)->update(['status' => 1]);
        return redirect()->route('pesanan.index')->with('message', ['type' => 'success', 'text' => 'Pembayaran berhasil.']);
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
