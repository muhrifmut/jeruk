@extends('layouts.home')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="pull-left">Kuisioner</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label for="transaksi" class="control-label col-md-2">ID Pesanan</label>
					<div class="col-md-10">
			            <p>{{ $kuisioner->transaksi_id }}</p>
				    </div>
			    </div>
				<div class="form-group">
					<label for="nama" class="control-label col-md-2">Nama</label>
					<div class="col-md-10">
						<p>{{ $kuisioner->nama }}, {{ $kuisioner->umur }} Tahun</p>
			        </div>
			    </div>

				<div class="form-group">
					<label for="pertanyaan" class="control-label col-md-2">Pertanyaan</label>
					<div class="col-md-10">
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
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 1)->first()->jawaban == 1)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 1)->first()->jawaban == 2)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 1)->first()->jawaban == 3)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 1)->first()->jawaban == 4)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 1)->first()->jawaban == 5)
						        		x
						        	@endif
						        </td>
						      </tr>
						      <tr>
						        <td>2</td>
						        <td>Saya tidak terlalu lama menunggu pesanan.</td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 2)->first()->jawaban == 1)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 2)->first()->jawaban == 2)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 2)->first()->jawaban == 3)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 2)->first()->jawaban == 4)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 2)->first()->jawaban == 5)
						        		x
						        	@endif
						        </td>
						      </tr>
						      <tr>
						        <td>3</td>
						        <td>Karyawan restoran memiliki pengetahuan tentang menu yang di pesan.</td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 3)->first()->jawaban == 1)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 3)->first()->jawaban == 2)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 3)->first()->jawaban == 3)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 3)->first()->jawaban == 4)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 3)->first()->jawaban == 5)
						        		x
						        	@endif
						        </td>
						      </tr>
						      <tr>
						        <td>4</td>
						        <td>Cita rasa menu yang disajikan selalu sama setiap saat.</td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 4)->first()->jawaban == 1)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 4)->first()->jawaban == 2)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 4)->first()->jawaban == 3)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 4)->first()->jawaban == 4)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 4)->first()->jawaban == 5)
						        		x
						        	@endif
						        </td>
						      </tr>
						      <tr>
						        <td>5</td>
						        <td>Saya merasa puas dengan pelayanan yang cepat dan tepat diberikan restoran.</td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 5)->first()->jawaban == 1)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 5)->first()->jawaban == 2)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 5)->first()->jawaban == 3)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 5)->first()->jawaban == 4)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 5)->first()->jawaban == 5)
						        		x
						        	@endif
						        </td>
						      </tr>
						      <tr>
						        <td>6</td>
						        <td>Saya merasa puas dengan kenyamanan, keamanan, dan kebersiahn restoran.</td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 6)->first()->jawaban == 1)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 6)->first()->jawaban == 2)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 6)->first()->jawaban == 3)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 6)->first()->jawaban == 4)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 6)->first()->jawaban == 5)
						        		x
						        	@endif
						        </td>
						      </tr>
						      <tr>
						        <td>7</td>
						        <td>Saya merasa puas dengan cita rasa makanan atau minuman disediakan.</td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 7)->first()->jawaban == 1)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 7)->first()->jawaban == 2)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 7)->first()->jawaban == 3)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 7)->first()->jawaban == 4)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 7)->first()->jawaban == 5)
						        		x
						        	@endif
						        </td>
						      </tr>
						      <tr>
						        <td>8</td>
						        <td>Peralatan makanan yang digunakan lengkap.</td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 8)->first()->jawaban == 1)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 8)->first()->jawaban == 2)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 8)->first()->jawaban == 3)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 8)->first()->jawaban == 4)
						        		x
						        	@endif
						        </td>
						        <td>
						        	@if($pertanyaan->where('pertanyaan', 8)->first()->jawaban == 5)
						        		x
						        	@endif
						        </td>
						      </tr>
						    </tbody>
						  </table>
					</div>
				</div>

				<div class="form-group">
					<label for="kritikatausaran" class="control-label col-md-2">Kritik atau Saran</label>
					<div class="col-md-8">
						<p>{{ $kuisioner->kritikatausaran }}</p>
				    </div>
				</div>

			</div>
			<div class="box-footer">
				<div class="form-group">
					<div class="col-md-12">
						<a href="{{ route('kuisioner.index') }}" class="btn btn-primary">Kembali</a>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection	