@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="pull-left">Daftar Menu</h3>
                @if (Auth::user()->status <> 'pelayan')
                <a href="{{ route('menu.create') }}" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tambah Menu
                </a>
                @endif
            </div>
            <div class="box-body">
                <table class="table" id="table">
                    <thead>
                    <tr>
                            <td class="col-md-1">ID</td>
                            <td class="col-md-3">Nama</td>
                            <td class="col-md-1">Harga</td>
                            <td class="col-md-3">Bahan</td>
                            <td class="col-md-1">Status</td>
                            @if (Auth::user()->status <> 'pelayan')
                                <td class="col-md-2"></td>
                            @endif
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($menu as $m)
                            <tr>
                                <td>{{ $m->id }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>Rp. {{ $m->harga }}</td>
                                <td>
                                    @foreach ($bahanmenu->where('menu_id', $m->id) as $bm)
                                        <p>{{ $m->id == $bm->menu_id ? "- ".$bm->bahan->nama." [".$bm->jumlah_bahan." ".$bm->bahan->satuan."]" : ""}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @if($m->status == 1)
                                        <span class="label label-success">Tersedia</span>
                                    @else
                                        <span class="label label-default">Tidak tersedia</span>
                                    @endif
                                </td>
                                @if (Auth::user()->status <> 'pelayan')
                                <td>
                                    <center>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['menu.destroy', $m->id]]) }}
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                    {{ Form::close() }}
                                    </center>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
            </div>
        </div>
        </div>
    </div>
@endsection