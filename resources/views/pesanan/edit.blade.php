@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="pull-left">Pesanan Baru</h3>
			</div>
			{!! Form::open([ $pesanan,'route' => ['pesanan.update', $pesanan->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
			<div class="box-body">
				<div class="form-group">
					<label for="nama" class="control-label col-md-2">Nama Pemesan</label>
					<div class="col-md-8">
						{!! Form::text('nama', old('nama', $pesanan->nama), ['class'=>'form-control']) !!}
				        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
			    <div class="form-group">
					<label for="meja" class="control-label col-md-2">Meja Tersedia</label>
					<div class="col-md-8">
			            <select name="meja" class="form-control">
			            	@if($meja->count() == 0)
			            		<option value="{{ $pesanan->meja_id }}" selected> {{ $pesanan->meja_id }} </option>
			            	@else
					            @foreach(\App\Meja::where('id', $pesanan->meja_id)->orWhere('status', 1)->get() as $me)
					                <option value="{{ $me->id }}" {{ $me->id == $pesanan->meja_id ? "selected" : ""}}> {{ $me->id }} </option>
					            @endforeach
					        @endif
			            </select>
				        {!! $errors->first('meja', '<p class="help-block">:message</p>') !!}
				    </div>
			        </div>
			    </div>
			    @foreach (\App\Pesanan::where('id', $pesanan->id)->get(['menu_id', 'jumlah_menu']) as $key => $menuYangPesan)
				<div class="form-group menu" style="padding: 8px;">
				    <label class="control-label col-md-2 label-menu">
				    	@if ($key == 0)
				    	Menu Tersedia
				    	@endif
				    </label>
						<div class="col-md-8">
					        <div class="input-group my-group">
					            <select name="menu[]" class="form-control">
					            	@foreach($menu as $m)
					                <option value="{{ $m->id }}" {{ $m->id == $menuYangPesan->menu_id ? "selected" : ""}}>{{ $m->nama }}</option>
					                @endforeach
					            </select> 
					            <input type="text" class="form-control jumlah-menu" name="jumlah_menu[]" style="width: 15%" placeholder="jml" value="{{ $menuYangPesan->jumlah_menu }}" />
					            <button type="button" id="{{ $key == 0 ? 'addmenu' : '' }}" class="btn btn-default removemenu" onclick="{{ $key != 0 ? '$(this).parent().parent().parent().remove()' : '' }}"><i class="glyphicon glyphicon-{{ $key == 0 ? 'plus' : 'minus' }}"></i></button>
					        </div>
					        {!! $errors->first('menu', '<p class="help-block">:message</p>') !!}
					        {!! $errors->first('jumlah_menu', '<p class="help-block">:message</p>') !!}
				    	</div>
				</div>
				@endforeach
				<div class="box-footer">
					<div class="form-group">
						<div class="col-md-12">
							<a href="{{ route('pesanan.index') }}" class="btn btn-primary">Kembali</a>
							{!! Form::submit('Simpan', ['class'=>'btn btn-success pull-right']) !!}
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection