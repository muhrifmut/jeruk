@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="pull-left">Data Bahan</h3>
            </div>
            <div class="box-body">
                <table class="table" id="table">
                    <thead>
                    <tr>
                        <td class="col-md-1">ID</td>
                        <td class="col-md-5">Nama</td>
                        <td class="col-md-2">Stock</td>
                        <td class="col-md-2">Tanggal Kadaluarsa</td>
                        <td class="col-md-2"></td>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($bahan as $b)
                        <tr>
                            <td>{{ $b->id }}</td>
                            <td>{{ $b->nama }}</td>
                            <td>{{ $b->stock }} {{ $b->satuan }}</td>
                            <td>{{ $b->tgl_kadaluarsa }}</td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['bahan.destroy', $b->id]]) }}
                                    <a href="{{ route('bahan.edit', $b->id) }}" class="btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus
                                    </button>
                                {!! Form::close() !!}
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