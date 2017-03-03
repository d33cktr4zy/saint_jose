
@extends('template.utama')
@section('topScripts')

@endsection
@section('content')
	<div class="container-fluid" id="regis">
		<div class="row" id="regis">
			<div class="col-md-12">
				<h1>Registrasi pengguna (lanjutan)</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				{!! Form::open(['action' => 'UserController@prosesRegistrasi', 'method' => 'post', 'class'=>'form-horizontal']) !!}
{{--				{!! var_dump(Session::all(), $detail) !!}--}}
				@if(isset($detail))
				{{--if umat gereja form ini dikeluarkan--}}
					@include('form.formRegisterDuaUmat')
				@else
				{{--kalo bukan umat, form ini yang di tuang--}}
					@include('form.formRegisterDuaBiasa')
				@endif
			</div>
		</div>
	</div>

	{{--	{!! dd(Input::flash()) !!}--}}


@endsection