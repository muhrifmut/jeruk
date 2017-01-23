@extends('layouts.home')

@section('content')
        <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="pull-left">Data Pesanan</h3>
            </div>
            <div class="box-body">
                <table class="table" id="table">
                    <thead>
                    <tr>
                        <td class="col-md-1">ID</td>
                        <td class="col-md-4">Nama</td>
                        <td class="col-md-1">Meja</td>
                        <td class="col-md-4">Pesanan</td>
                        <td class="col-md-2"></td>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($pesanan as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->meja_id }}</td>
                                <td>{{ $p->jumlah_menu }} {{ $p->menu->nama }}</td>
                                <td style="text-align: right;">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['pesanan.destroy', $p->id]]) }}
                                        <a href="{{ route('pesanan.edit', $p->id) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                    {{ Form::close() }}
                                </td>
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