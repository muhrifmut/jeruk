@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="pull-left">Tambah Pegawai</h3>
			</div>
			{!! Form::open(['route' => ['pegawai.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			<div class="box-body">
				<div class="form-group">
					<label for="name" class="control-label col-md-2">Nama</label>
					<div class="col-md-8">
						{!! Form::text('name', old('name', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>

				<div class="form-group">
					<label for="email" class="control-label col-md-2">Email</label>
					<div class="col-md-8">
						{!! Form::email('email', old('email', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>

			    <div class="form-group">
					<label for="status" class="control-label col-md-2">Status</label>
					<div class="col-md-8">
						<select name="status" class="form-control">
							@foreach($role as $r)
								<option value="{{ $r->nama }}">{{ $r->nama }}</option>
							@endforeach
						</select>
				    </div>
				</div>

				<div class="form-group">
					<label for="password" class="control-label col-md-2">Password</label>
					<div class="col-md-8">
						{!! Form::password('password', ['class'=>'form-control']) !!}
				        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
			        </div>
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