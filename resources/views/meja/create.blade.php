@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="pull-left">Tambah Data Bahan</h3>
			</div>
			{!! Form::open(['route' => ['bahan.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			<div class="box-body">
				<div class="form-group">
					<label for="nama" class="control-label col-md-2">Nama</label>
					<div class="col-md-8">
						{!! Form::text('nama', old('nama', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>

			    <div class="form-group">
					<label for="stock" class="control-label col-md-2">Jumlah</label>
					<div class="col-md-8">
						{!! Form::text('stock', old('stock', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
				    </div>
				</div>

				<div class="form-group">
					<label for="satuan" class="control-label col-md-2">Satuan</label>
					<div class="col-md-8">
						{!! Form::text('satuan', old('satuan', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('satuan', '<p class="help-block">:message</p>') !!}
				    </div>
				</div>

				<div class="form-group">
					<label for="tgl_kadaluarsa" class="control-label col-md-2">Tanggal Kadaluarsa</label>
					<div class="col-md-8">
						{!! Form::date('tgl_kadaluarsa', old('tgl_kadaluarsa', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('tgl_kadaluarsa', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>

			</div>
			<div class="box-footer">
				<div class="form-group">
					<div class="col-md-12">
						<a href="{{ route('bahan.index') }}" class="btn btn-primary">Kembali</a>
						{!! Form::submit('Simpan', ['class'=>'btn btn-success pull-right']) !!}
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection