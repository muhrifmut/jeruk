@if (session()->has('message'))
		<div class="col-lg-12">
			<div class="alert alert-{{ session('message.type') }} alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{!! session('message.text') !!}
			</div>
		</div>
@endif