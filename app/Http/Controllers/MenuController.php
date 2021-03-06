<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\BahanMenu;
use App\Bahan;
use Carbon\Carbon;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all()->where('verifikasi', 1);
        $bahan = Bahan::all();
        $bahanmenu = BahanMenu::all();

        /*foreach ($menu as $k => $v) {
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

        }*/

        foreach ($menu as $key => $value) {
            if($menu[$key]->jumlah < 1) {
                $menu[$key]->update([
                    'status' => 0,
                ]);
            } else {
                $menu[$key]->update([
                    'status' => 1,
                ]);
            }
        }
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
            'satuan' => 'required',
            'jumlah_bahan' => 'required',
        ]);

        $menu = Menu::create([
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'verifikasi' => 0,
            'status' => 0,
            'jumlah' => 0,
        ]);

        $bahan = $request->input('bahan');
        $satuan = $request->input('satuan');
        $jumlah_bahan = $request->input('jumlah_bahan');

        foreach ($bahan as $key => $value) {
            $bahanmenu = new Bahanmenu;
            $bahanmenu->menu()->associate($menu);
            $bahanmenu->bahan = $bahan[$key]." ".$jumlah_bahan[$key]." ".$satuan[$key];
            $bahanmenu->jumlah_bahan = $jumlah_bahan[$key];
            $bahanmenu->save();
        }

        return redirect()->to('home/menubaru')->with('message', ['type' => 'success', 'text' => 'Data berhasil ditambahkan!']);
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
        $menu = Menu::find($id);
        $bahanmenu = BahanMenu::all();
        $bahan = Bahan::all();

        return view('menu.edit', compact('menu', 'bahanmenu', 'bahan'));
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
        $menu = Menu::find($id);

        $menu->update([
            'jumlah' => $request->input('jumlah_menu'),
        ]);

        return redirect()->back()->with('message', ['type' => 'danger', 'text' => 'Data telah diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        BahanMenu::where('menu_id', $menu->id )->delete();

        return redirect()->back()->with('message', ['type' => 'danger', 'text' => 'Data telah dihapus!']);
    }
}
