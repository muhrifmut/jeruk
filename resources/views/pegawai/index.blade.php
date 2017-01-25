@extends('layouts.home')

@section('content')
        <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="pull-left">Daftar Menu</h3>
                <a href="{{ route('pegawai.create') }}" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tambah Pegawai
                </a>
            </div>
            <div class="box-body">
                <table class="table" id="table">
                    <thead>
                    <tr>
                        <td class="col-md-1">ID</td>
                        <td class="col-md-4">Nama</td>
                        <td class="col-md-4">Email</td>
                        <td class="col-md-1">Status</td>
                        <td class="col-md-2"></td>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($pegawai as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->status }}</td>
                                <td>
                                    <center>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['pegawai.destroy', $p->id]]) }}
                                        <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                    {{ Form::close() }}
                                    </center>
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