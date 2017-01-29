<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahan::all();

        return view('bahan.index', compact('bahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahan.create');
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
            'tgl_kadaluarsa' => 'required|date',
        ]);

        \App\Bahan::create([
            'nama' => $request->input('nama'),
            'tgl_kadaluarsa' => $request->input('tgl_kadaluarsa'),
        ]);

        return redirect()->route('bahan.index')->with('message', ['type' => 'success', 'text' => 'Data berhasil ditambahkan!']);
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
        $bahan = Bahan::find($id);

        return view('bahan.edit', compact('bahan'));
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
        $bahan = Bahan::find($id);

        $this->validate($request, [
            'nama' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'stock' => 'required|numeric',
            'satuan' => 'required|alpha',
            'tgl_kadaluarsa' => 'required|date',
        ]);

        $bahan->update([
            'nama' => $request->input('nama'),
            'stock' => $request->input('stock'),
            'satuan' => $request->input('satuan'),
            'tgl_kadaluarsa' => $request->input('tgl_kadaluarsa'),
        ]);

        return redirect()->route('bahan.index')->with('message', ['type' => 'success', 'text' => 'Data berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bahan::find($id)->delete();
        return redirect()->route('bahan.index')->with('message', ['type' => 'danger', 'text' => 'Data telah dihapus!']);
    }
}
