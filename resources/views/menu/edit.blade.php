@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="pull-left">Tambah Data Pegawai</h3>
			</div>
			{!! Form::open([ $menu,'route' => ['menu.update', $menu->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
			<div class="box-body">
				<div class="form-group">
					<label for="nama" class="control-label col-md-2">Nama</label>
					<div class="col-md-8">
						{!! Form::text('nama', old('nama', $menu->nama), ['class'=>'form-control', 'disabled']) !!}
				        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
			    <div class="form-group">
					<label for="harga" class="control-label col-md-2">Harga</label>
					<div class="col-md-8">
						{!! Form::text('harga', old('harga', $menu->harga), ['class'=>'form-control', 'disabled']) !!}
				        {!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
			    <div class="form-group">
					<label for="jumlah_menu" class="control-label col-md-2">Jumlah Menu</label>
					<div class="col-md-8">
						{!! Form::number('jumlah_menu', old('jumlah_menu', $menu->jumlah), ['class'=>'form-control']) !!}
				        {!! $errors->first('jumlah_menu', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
				<div class="form-group tambahbahan">
				    <label class="control-label col-md-2 label-bahan">Bahan</label>
					<div class="col-md-8">
				        @foreach ($bahanmenu->where('menu_id', $menu->id) as $bm)
                            <p>{{ $menu->id == $bm->menu_id ? $bm->bahan : ""}}</p>
                        @endforeach
				    </div>
				</div>
				<div class="box-footer">
					<div class="form-group">
						<div class="col-md-12">
							<a href="{{ route('menu.index') }}" class="btn btn-primary">Kembali</a>
							{!! Form::submit('Simpan', ['class'=>'btn btn-success pull-right']) !!}
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection