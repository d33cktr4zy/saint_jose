
@extends('template.utama')
@section('content')
	<div class="section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1>Registrasi Pengguna</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					@include('errors.loginErrors')
					{!! Form::open(['action' => 'UserController@postRegistrationOne', 'role' => 'form', 'class' => 'form-horizontal' ]) !!}
						<div class="form-group">
							<div class="col-sm-2 text-right">
								{!! Form::label('username', 'Username :', ['class' => 'control-label']) !!}
							</div>
							<div class="col-sm-4">
								{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Username', 'id'=>'username']) !!}
								{!! $errors->first('username','<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2 text-right">
								{!! Form::label('email', 'Email :', ['class' => 'control-label']) !!}
							</div>
							<div class="col-sm-4">
								{!! Form::email('email',null , ['class' => 'form-control', 'placeholder' => 'Masukkan E-mail', 'id'=>'email']) !!}
								{!! $errors->first('email','<span class="help-block">:message</span>') !!}
							</div>
							<div class="col-sm-4">
								{!! Form::email('email-konfirm',null , ['class' => 'form-control', 'placeholder' => 'Konfirmasi E-mail', 'id'=>'email-konfirm']) !!}
								{!! $errors->first('email-konfirm','<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-8">
								<div class="checkbox">
									<label>
										{!! Form::checkbox('umat', '1', null,  ['id' => 'umat']) !!}
										Apakah Anda umat St. Joseph
									</label>
								</div>
							</div>
						</div>
						<div class="form-group" id="umatGrup">
							<div class="col-sm-2 text-right">
								{!! Form::label('idumat', 'ID Umat :', ['class' => 'control-label']) !!}
							</div>
							<div class="col-sm-4">
								{!! Form::text('idumat', '', ['class' => 'form-control', 'id' => 'idumat', 'placeholder' => 'ID Umat']) !!}
								{!! $errors->first('idumat','<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-4">
								<button class="btn btn-block ">
									{!! Form::submit('Daftar', ['class' => 'btn btn-block btn-danger btn-lg']) !!}
								</button>
							</div>
							<script type="text/javascript">
								$(document.getElementById('umatGrup')).ready(function(){
									$(document.getElementById('umat')).attr('checked', false);
									$(document.getElementById('umatGrup')).hide();

								});
								$(document).ready(function(){
									$(document.getElementById('umat')).change(function(){
										if(document.getElementById('umat').checked){
											$(document.getElementById('umatGrup')).fadeIn();
										}else{
											$(document.getElementById('umatGrup')).fadeOut();
										}
									});

								});
							</script>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop

@section('additionalJS')
	{{-- toggle id umat --}}

@endsection