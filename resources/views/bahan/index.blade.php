@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="pull-left">Data bahan</h2>
                </div>
                <div class="box-body">
                    <table class="table">
                        <tr class="bg-primary">
                            <td class="col-md-1">ID</td>
                            <td class="col-md-4">Nama</td>
                            <td class="col-md-2">Jumlah</td>
                            <td class="col-md-3">Tanggal Kadaluarsa</td>
                            <td class="col-md-2"></td>
                        </tr>
                        @foreach ($bahan as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>{{ $b->nama }}</td>
                                <td>{{ $b->stock }} {{ $b->satuan }}</td>
                                <td>{{ $b->tgl_kadaluarsa }}</td>
                                <td style="text-align: right;">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['bahan.destroy', $b->id]]) }}
                                        <a href="{{ route('bahan.edit', $b->id) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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