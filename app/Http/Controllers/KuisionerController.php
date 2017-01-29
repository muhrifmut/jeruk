<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Kuisioner;
use App\Pertanyaan;

class KuisionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kuisioner = Kuisioner::paginate(15);

        return view('kuisioner.index', compact('kuisioner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = Transaksi::all();

        return view('kuisioner.create', compact('transaksi'));
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
            'transaksi' => 'numeric',
            'usia' => 'required',
            'kritikatausaran' => 'required',
        ]);

        $kuisioner = Kuisioner::create([
            'nama' => $request->input('nama'),
            'umur' => $request->input('usia'),
            'transaksi_id' => $request->input('transaksi'),
            'kritikatausaran' => $request->input('kritikatausaran'),
        ]);

        for ($i=1; $i < 9; $i++) { 
            # code...
            $pertanyaan = new Pertanyaan;
            $pertanyaan->kuisioner()->associate($kuisioner); 
            $pertanyaan->pertanyaan = $i;
            $pertanyaan->jawaban = $request->input('jawaban-'.$i);
            $pertanyaan->save();
        }

        return redirect()->route('kuisioner.index')->with('message', ['type' => 'success', 'text' => 'Kuisioner telah dibuat.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kuisioner = Kuisioner::find($id);
        $pertanyaan = Pertanyaan::where('kuisioner_id', $id)->get();

        return view('kuisioner.show', compact('kuisioner', 'pertanyaan'));
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
