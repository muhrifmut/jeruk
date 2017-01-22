@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="pull-left">Tambah Data Pegawai</h3>
			</div>
			{!! Form::open(['route' => ['menu.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			<div class="box-body">
				<div class="form-group">
					<label for="nama" class="control-label col-md-2">Nama</label>
					<div class="col-md-8">
						{!! Form::text('nama', old('nama', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
			    <div class="form-group">
					<label for="harga" class="control-label col-md-2">Harga</label>
					<div class="col-md-8">
						{!! Form::text('harga', old('harga', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
				<div class="form-group tambahbahan">
				    <label class="control-label col-md-2 label-bahan">Bahan</label>
					<div class="col-md-8">
				        <div class="input-group my-group">
				            <select name="bahan[]" class="form-control">
				            @foreach($bahan as $b)
				                <option value="{{ $b->id }}">{{ $b->nama }} ({{ $b->satuan }})</option>
				            @endforeach
				            </select> 
				            <input type="text" class="form-control jumlah-bahan" name="jumlah_bahan[]" style="width: 15%" placeholder="jml" />
				            <button type="button" id="add" class="btn btn-default remove"><i class="glyphicon glyphicon-plus"></i></button>
				        </div>
				        {!! $errors->first('bahan', '<p class="help-block">:message</p>') !!}
				        {!! $errors->first('jumlah_bahan', '<p class="help-block">:message</p>') !!}
				    </div>
				</div>
				<div class="box-footer">
					<div class="form-group">
						<div class="col-md-12">
							<a href="{{ route('pegawai.index') }}" class="btn btn-primary">Kembali</a>
							{!! Form::submit('Simpan', ['class'=>'btn btn-success pull-right']) !!}
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection