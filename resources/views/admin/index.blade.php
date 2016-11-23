@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Pegawai</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr class="info">
                            <td>ID</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Status</td>
                        </tr>
                        @foreach ($pegawai as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->status }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection