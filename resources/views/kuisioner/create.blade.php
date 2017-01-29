@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="pull-left">Kuisioner</h3>
			</div>
			{!! Form::open(['route' => ['kuisioner.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			<div class="box-body">
				<div class="form-group">
					<label for="transaksi" class="control-label col-md-2">ID Pesanan</label>
					<div class="col-md-8">
			            <select name="transaksi" class="form-control">
				            @foreach($transaksi as $tr)
				                <option value="{{ $tr->pesanan_id }}">{{ $tr->pesanan_id }}</option>
				            @endforeach
			            </select>
				        {!! $errors->first('transaksi', '<p class="help-block">:message</p>') !!}
				    </div>
			    </div>
				<div class="form-group">
					<label for="nama" class="control-label col-md-2">Nama</label>
					<div class="col-md-8">
						{!! Form::text('nama', old('nama', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>

			    <div class="form-group">
					<label for="usia" class="control-label col-md-2">Usia</label>
					<div class="col-md-8">
						{!! Form::number('usia', old('usia', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('usia', '<p class="help-block">:message</p>') !!}
				    </div>
				</div>

				<div class="form-group">
					<label for="pertanyaan" class="control-label col-md-2">Pertanyaan</label>
					<div class="col-md-8">
						  <table class="table table-hover">
						    <thead>
						      <tr>
						        <th>No</th>
						        <th>Variabel</th>
						        <th>STS</th>
						        <th>TS</th>
						        <th>KS</th>
						        <th>S</th>
						        <th>SS</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>1</td>
						        <td>Karyawan restoran cekatan dalam menangani kebutuhan Anda.</td>
						        <td><label><input type="radio" name="jawaban1" value="1"></label></td>
						        <td><label><input type="radio" name="jawaban1" value="2"></label></td>
						        <td><label><input type="radio" name="jawaban1" value="3"></label></td>
						        <td><label><input type="radio" name="jawaban1" value="4"></label></td>
						        <td><label><input type="radio" name="jawaban1" value="5"></label></td>
						      </tr>
						      <tr>
						        <td>2</td>
						        <td>Saya tidak terlalu lama menunggu pesanan.</td>
						        <td><label><input type="radio" name="jawaban2" value="1"></label></td>
						        <td><label><input type="radio" name="jawaban2" value="2"></label></td>
						        <td><label><input type="radio" name="jawaban2" value="3"></label></td>
						        <td><label><input type="radio" name="jawaban2" value="4"></label></td>
						        <td><label><input type="radio" name="jawaban2" value="5"></label></td>
						      </tr>
						      <tr>
						        <td>3</td>
						        <td>Karyawan restoran memiliki pengetahuan tentang menu yang di pesan.</td>
						        <td><label><input type="radio" name="jawaban3" value="1"></label></td>
						        <td><label><input type="radio" name="jawaban3" value="2"></label></td>
						        <td><label><input type="radio" name="jawaban3" value="3"></label></td>
						        <td><label><input type="radio" name="jawaban3" value="4"></label></td>
						        <td><label><input type="radio" name="jawaban3" value="5"></label></td>
						      </tr>
						      <tr>
						        <td>4</td>
						        <td>Cita rasa menu yang disajikan selalu sama setiap saat.</td>
						        <td><label><input type="radio" name="jawaban4" value="1"></label></td>
						        <td><label><input type="radio" name="jawaban4" value="2"></label></td>
						        <td><label><input type="radio" name="jawaban4" value="3"></label></td>
						        <td><label><input type="radio" name="jawaban4" value="4"></label></td>
						        <td><label><input type="radio" name="jawaban4" value="5"></label></td>
						      </tr>
						      <tr>
						        <td>5</td>
						        <td>Saya merasa puas dengan pelayanan yang cepat dan tepat diberikan restoran.</td>
						        <td><label><input type="radio" name="jawaban5" value="1"></label></td>
						        <td><label><input type="radio" name="jawaban5" value="2"></label></td>
						        <td><label><input type="radio" name="jawaban5" value="3"></label></td>
						        <td><label><input type="radio" name="jawaban5" value="4"></label></td>
						        <td><label><input type="radio" name="jawaban5" value="5"></label></td>
						      </tr>
						      <tr>
						        <td>6</td>
						        <td>Saya merasa puas dengan kenyamanan, keamanan, dan kebersiahn restoran.</td>
						        <td><label><input type="radio" name="jawaban6" value="1"></label></td>
						        <td><label><input type="radio" name="jawaban6" value="2"></label></td>
						        <td><label><input type="radio" name="jawaban6" value="3"></label></td>
						        <td><label><input type="radio" name="jawaban6" value="4"></label></td>
						        <td><label><input type="radio" name="jawaban6" value="5"></label></td>
						      </tr>
						      <tr>
						        <td>7</td>
						        <td>Saya merasa puas dengan cita rasa makanan atau minuman disediakan.</td>
						        <td><label><input type="radio" name="jawaban7" value="1"></label></td>
						        <td><label><input type="radio" name="jawaban7" value="2"></label></td>
						        <td><label><input type="radio" name="jawaban7" value="3"></label></td>
						        <td><label><input type="radio" name="jawaban7" value="4"></label></td>
						        <td><label><input type="radio" name="jawaban7" value="5"></label></td>
						      </tr>
						      <tr>
						        <td>8</td>
						        <td>Peralatan makanan yang digunakan lengkap.</td>
						        <td><label><input type="radio" name="jawaban8" value="1"></label></td>
						        <td><label><input type="radio" name="jawaban8" value="2"></label></td>
						        <td><label><input type="radio" name="jawaban8" value="3"></label></td>
						        <td><label><input type="radio" name="jawaban8" value="4"></label></td>
						        <td><label><input type="radio" name="jawaban8" value="5"></label></td>
						      </tr>
						    </tbody>
						  </table>
					</div>
				</div>

				<div class="form-group">
					<label for="kritikatausaran" class="control-label col-md-2">Kritik atau Saran</label>
					<div class="col-md-8">
						{!! Form::textarea('kritikatausaran', old('kritikatausaran', null), ['class'=>'form-control']) !!}
				        {!! $errors->first('kritikatausaran', '<p class="help-block">:message</p>') !!}
				    </div>
				</div>

			</div>
			<div class="box-footer">
				<div class="form-group">
					<div class="col-md-12">
						<a href="{{ route('kuisioner.index') }}" class="btn btn-primary">Kembali</a>
						{!! Form::submit('Simpan', ['class'=>'btn btn-success pull-right']) !!}
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection	