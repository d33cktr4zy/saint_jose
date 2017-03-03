@extends('template.utama')
@section('content')

		<div class="row">
			<div class="col-xs-12">
				<h1 class="text-center">User Login</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4 col-xs-offset-4">
                {{--{!! var_dump(Session::all()) !!}--}}
				@include('errors.loginErrors')
				{!! Form::open(['url' => 'login', 'method' => 'post','role'=>'form']) !!}
				<div class="form-group">
					{!! Form::label('username', 'Username :', ['class' => 'control-label']) !!}
					{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username','id'=>'username']) !!}
					{!! $errors->first('username','<span class="help-block">:message</span>') !!}
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Password : ', ['class' => 'control-label']) !!}
					{!! Form::password('password', ['class' => 'form-control','id'=>'password','placeholder' => 'Password']) !!}
					{!! $errors->first('password','<span class="help-block">:message</span>') !!}
				</div>
				<div class="checkbox">
					<label class="control-label">
							{!! Form::checkbox('remember', '1', null,  ['id' => 'rememberme']) !!}
							Ingat Saya
					</label>
				</div>
				<div class="btn-group pull-right">
					<button type="button" class="btn btn-danger">Batal</button>
					<button type="submit" class="btn btn-primary">Login</button>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div>

				{!! Form::close() !!}
			</div>
		</div>


@stop