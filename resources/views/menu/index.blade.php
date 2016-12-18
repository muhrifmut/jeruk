@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="pull-left">Data Menu</h2>
                </div>
                <div class="box-body">
                    <table class="table">
                        <tr class="bg-primary">
                            <td class="col-md-1">ID</td>
                            <td class="col-md-4">Nama</td>
                            <td class="col-md-1">Harga</td>
                            <td class="col-md-2">Bahan</td>
                            <td class="col-md-1">Status</td>
                            <td class="col-md-2"></td>
                        </tr>
                        @foreach ($menu as $m)
                            <tr>
                                <td>{{ $m->id }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>Rp. {{ $m->harga }}</td>
                                <td>
                                    @foreach ($bahanmenu as $bm)
                                        <p>{{ $m->id == $bm->menu_id ? "- ".$bm->bahan->nama." (".$bm->jumlah_bahan." ".$bm->bahan->satuan.")" : ""}}</p>
                                    @endforeach
                                </td>
                                <td>{{ $m->status }}</td>
                                <td style="text-align: right;">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['menu.destroy', $m->id]]) }}
                                        <a href="{{ route('menu.edit', $m->id) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection