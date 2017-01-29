@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			{!! Form::open([ $pesanan,'route' => ['pembayaran.update', $pesanan->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
			{!! Form::hidden('total_harga', old('total_harga',$total_harga)) !!}
			<div class="box-header">
				<h3 class="pull-left">Detail Pesanan <span class="label label-default">#{{ $pesanan->id }}</span></h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label for="nama" class="control-label col-md-2">Nama Pemesan</label>
					<div class="col-md-8">
						{!! Form::text('nama', old('nama', $pesanan->nama), ['class'=>'form-control', 'disabled']) !!}
			        </div>
			    </div>
			    <div class="form-group">
					<label for="meja" class="control-label col-md-2">Meja</label>
					<div class="col-md-8">
			            {!! Form::text('meja', old('meja', $pesanan->meja_id), ['class'=>'form-control', 'disabled']) !!}
				    </div>
			        </div>
			    </div>
			    @foreach($pesanan->where('id', $pesanan->id)->select('menu_id', 'jumlah_menu')->get() as $key => $p)
				<div class="form-group menu" style="padding: 8px;">
				    <label class="control-label col-md-2 label-menu">
				    	@if($key == 0)
				    		Menu
				    	@endif
				    </label>
					<div class="col-md-8">
			    			{!! Form::text('menu', old('menu', $p->menu->nama.' ['.$p->jumlah_menu.' x '.$p->menu->harga.'] = Rp. '.$p->jumlah_menu * $p->menu->harga), ['class'=>'form-control', 'disabled']) !!}
			    	</div>
				</div>
				@endforeach
				<hr>
				<div class="form-group">
					<label for="total_harga" class="control-label col-md-2">Total Bayar</label>
					<div class="col-md-8">
			            {!! Form::text('th', old('th', 'Rp. '.$total_harga), ['class'=>'form-control', 'disabled']) !!}
				    </div>
			    </div>
				<div class="box-footer">
					<div class="form-group">
						<div class="col-md-12">
							@if (\Auth::user()->status == 'pelayan')
								<a href="{{ route('pesanan.index') }}" class="btn btn-primary">Kembali</a>
							@endif
							@if (\Auth::user()->status == 'kasir')
								<a href="{{ route('pesanan.index') }}" class="btn btn-primary">Kembali</a>
							@endif
							@if (\Auth::user()->status == 'admin')
								<a href="{{ route('pembayaran.index') }}" class="btn btn-primary">Kembali</a>
							@endif
							@if($pesanan->pembayaran == 0)
								{!! Form::submit('Bayar', ['class'=>'btn btn-success pull-right']) !!}
							@endif
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection