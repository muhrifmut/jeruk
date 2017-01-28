@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="pull-left">Pesanan Baru</h3>
			</div>
			{!! Form::open(['route' => ['pesanan.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			<div class="box-body">
				<div class="form-group">
					<label for="nama" class="control-label col-md-2">Nama Pemesan</label>
					<div class="col-md-8">
						{!! Form::text('nama', old('nama', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
			    <div class="form-group">
					<label for="meja" class="control-label col-md-2">Meja Tersedia</label>
					<div class="col-md-8">
			            <select name="meja" class="form-control">
				            @foreach($meja as $me)
				                <option value="{{ $me->id }}">{{ $me->id }}</option>
				            @endforeach
			            </select>
				        {!! $errors->first('meja', '<p class="help-block">:message</p>') !!}
				    </div>
			        </div>
			    </div>
				<div class="form-group menu" style="padding: 8px;">
				    <label class="control-label col-md-2 label-menu">Menu Tersedia</label>
					<div class="col-md-8">
				        <div class="input-group my-group">
				            <select name="menu[]" class="form-control">
				            @foreach($menu as $m)
				                <option value="{{ $m->id }}">{{ $m->nama }}</option>
				            @endforeach
				            </select> 
				            <input type="text" class="form-control jumlah-menu" name="jumlah_menu[]" style="width: 15%" placeholder="jml" />
				            <button type="button" id="addmenu" class="btn btn-default removemenu"><i class="glyphicon glyphicon-plus"></i></button>
				        </div>
				        {!! $errors->first('menu', '<p class="help-block">:message</p>') !!}
				        {!! $errors->first('jumlah_menu', '<p class="help-block">:message</p>') !!}
				    </div>
				</div>
				<div class="box-footer">
					<div class="form-group">
						<div class="col-md-12">
							@if (\Auth::user()->status == 'pelayan')
								<a href="{{ URL::to('home') }}" class="btn btn-primary">Kembali</a>
							@endif
							@if (\Auth::user()->status == 'admin')
								<a href="{{ route('pesanan.index') }}" class="btn btn-primary">Kembali</a>
							@endif
							{!! Form::submit('Simpan', ['class'=>'btn btn-success pull-right']) !!}
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection