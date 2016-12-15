<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = User::all();
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('pegawai.create', compact('role'));
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'email' => 'required|unique:users,email',
            'status' => 'required',
            'password' => 'required|min:6',
        ]);

        \App\User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('pegawai.index')->with('message', ['type' => 'success', 'text' => 'Data berhasil ditambahkan!']);
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
        $pegawai = User::find($id);
        $role = Role::all();

        return view('pegawai.edit', compact('pegawai', 'role'));
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
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:2',
            'email' => 'required|email',
            'status' => 'required',
            'password' => 'min:6',
        ]);

        if($request->input('password') == null) {
            $user->update([
                'name' => $request->input('name'),
                'status' => $request->input('status'),
            ]);
        } else {
            $user->update([
                'name' => $request->input('name'),
                'status' => $request->input('status'),
                'password' => bcrypt($request->input('password')),
            ]);
        }

        if(($request->input('email') != $user->email) && (($request->input('email') != \App\User::all()->where('email',$request->input('email')))) ) {
            $user->update([
                'email' => $request->input('email'),
            ]);
        } else {
            return redirect()->route('pegawai.index')->with('message', ['type' => 'success', 'text' => 'Email sudah digunakan!']);
        }

        return redirect()->route('pegawai.index')->with('message', ['type' => 'success', 'text' => 'Data berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('pegawai.index')->with('message', ['type' => 'danger', 'text' => 'Data telah dihapus!']);
    }
}
