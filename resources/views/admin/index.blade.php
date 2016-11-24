@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="pull-left">Data Pegawai</h2>
                </div>
                <div class="box-body">
                    <table class="table">
                        <tr class="bg-primary">
                            <td class="col-md-1">ID</td>
                            <td class="col-md-4">Nama</td>
                            <td class="col-md-4">Email</td>
                            <td class="col-md-1">Status</td>
                            <td class="col-md-2"></td>
                        </tr>
                        @foreach ($pegawai as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->status }}</td>
                                <td style="text-align: right;">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['pegawai.destroy', $p->id]]) }}
                                        <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-info btn-xs">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">Hapus</button>
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