@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="pull-left">Daftar Bahan</h3>
                @if(Auth::user()->status == 'pantry')
                <a href="{{ route('bahan.create') }}" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tambah Bahan
                </a>
                @endif
            </div>
            <div class="box-body">
                <table class="table" id="table">
                    <thead>
                    <tr>
                        <td class="col-md-1">ID</td>
                        <td class="col-md-5">Nama</td>
                        <td class="col-md-2">Tanggal Kadaluarsa</td>
                        @if(Auth::user()->status == 'pantry')
                        <td class="col-md-2"></td>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($bahan as $b)
                        <tr>
                            <td>{{ $b->id }}</td>
                            <td>{{ $b->nama }}</td>
                            <td>
                                @if($b->tgl_kadaluarsa <= \Carbon\Carbon::now())
                                    <center><span class="label label-danger">Kadaluarsa</span></center>
                                @else
                                    <center>{{ $b->tgl_kadaluarsa }}</center>
                                @endif
                            </td>
                            @if(Auth::user()->status == 'pantry')
                            <td>
                                <center>
                                    <a href="{{ route('bahan.edit', $b->id) }}" class="btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah
                                    </a>
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