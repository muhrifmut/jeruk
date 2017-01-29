@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="pull-left">Kuisioner <a href="{{ route('kuisioner.create') }}" class="btn btn-xs btn-success pull-right" style="margin-left: 10px; margin-top: 3px"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></h3>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						@foreach($kuisioner as $k)
							<h1 class="page-header"><a href="{{ route('kuisioner.show', $k->id) }}">{{ $k->nama }}</a>
								<small>#Umur: {{ $k->umur.' tahun' }} #ID Transaksi: {{ $k->transaksi_id }} </small>
							</h1>
							<p>{{ $k->kritikatausaran }}</p>
						@endforeach
					</div>
				</div>
			</div>
			<center>{{ $kuisioner->links() }}</center>
		</div>
	</div>
</div>
@endsection