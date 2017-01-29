@extends('layouts.home')

@section('content')
        <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="pull-left">Daftar Pesanan</h3>
                @if (Auth::user()->status == 'pelayan')
                <a href="{{ route('pesanan.create') }}" class="btn btn-success pull-right">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Pesanan Baru
                </a>
                @endif
            </div>
            <div class="box-body">
                <table class="table" id="table">
                    <thead>
                    <tr>
                        <td class="col-md-1">ID</td>
                        <td class="col-md-2">Nama</td>
                        <td class="col-md-1">Meja</td>
                        <td class="col-md-2">Pesanan</td>
                        <td class="col-md-2">Status</td>
                        <td class="col-md-2">Pembayaran</td>
                        @if((Auth::user()->status == 'pelayan') or (Auth::user()->status == 'kasir') or (Auth::user()->status == 'koki'))
                        <td class="col-md-2"></td>
                        @endif
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
                                    @if($ip->status == 0)
                                        <center><span class="label label-default">Belum dibuat</span></center>
                                    @endif
                                    @if($ip->status == 1)
                                        <center><span class="label label-success">Sedang dibuat</span></center>
                                    @endif
                                    @if($ip->status == 2)
                                        <center><span class="label label-info">Siap disajikan</span></center>
                                    @endif
                                </td>
                                <td>
                                    @if($ip->pembayaran == 0)
                                        <center><span class="label label-default">Belum dibayar</span></center>
                                    @else
                                        <center><span class="label label-success">Sudah dibayar</span></center>
                                    @endif
                                </td>
                                @if((Auth::user()->status == 'pelayan') or (Auth::user()->status == 'kasir') or (Auth::user()->status == 'koki'))
                                <td>
                                    <center>
                                    @if(Auth::user()->status == 'koki')
                                        @if($ip->status == 0)
                                            <a href="{{ URL::to('home/pesanan/buat', $ip->id)}}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-ok"></i> Buat</a>
                                        @endif
                                        @if($ip->status == 1)
                                            <a href="{{ URL::to('home/pesanan/selesai', $ip->id)}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-ok"></i> Selesai</a>
                                        @endif
                                    @endif

                                    @if((Auth::user()->status == 'pelayan') or (Auth::user()->status == 'kasir'))
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['pesanan.destroy', $p->id]]) }}
                                            @if($ip->pembayaran == 0)
                                                <a href="{{ route('pembayaran.edit', $p->id) }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i> Bayar</a>
                                            @endif
                                            @if(($ip->status == 0) and ($ip->pembayaran == 0))
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin membatalkan pesanan ini?')"><i class="glyphicon glyphicon-trash"></i> Batalkan</button>
                                            @endif
                                        {{ Form::close() }}
                                        </center>
                                    @endif
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