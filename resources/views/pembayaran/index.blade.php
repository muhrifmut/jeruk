@extends('layouts.home')

@section('content')
        <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="pull-left">Daftar Pesanan</h3>
                <a href="{{ route('pesanan.create') }}" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Pesanan Baru
                </a>
            </div>
            <div class="box-body">
                <table class="table" id="table">
                    <thead>
                    <tr>
                        <td class="col-md-1">ID</td>
                        <td class="col-md-3">Nama</td>
                        <td class="col-md-1">Meja</td>
                        <td class="col-md-3">Pesanan</td>
                        <td class="col-md-2">Status</td>
                        <td class="col-md-2"></td>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($idp as $ip)
                            <tr>
                                <td>{{ $ip->id }}</td>
                                <td>{{ $ip->nama }}</td>
                                <td>{{ $ip->meja_id }}</td>
                                <td>
                                    @foreach ($pesanan->where('id', $ip->id) as $p)
                                        <p>{{ $p->menu->nama }} [{{ $p->jumlah_menu }}]</p>
                                    @endforeach
                                </td>
                                <td>
                                    @if($ip->pembayaran == 0)
                                        <center><span class="label label-default">Belum dibayar</span></center>
                                    @else
                                        <center><span class="label label-success">Sudah dibayar</span></center>
                                    @endif
                                </td>
                                <td>   
                                    <center>
                                        <a href="{{ route('pembayaran.edit', $p->id) }}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
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