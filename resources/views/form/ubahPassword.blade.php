@extends('template.utama')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <h3 style="display: block;" class="text-center">Ubah Password</h3>
            {!! Form::open(['url' => '/user/password/'. Auth::user()->id  , 'method' => 'post', 'role' => 'form']) !!}
            	
                <div class="form-group">
                    <label class="control-label" for="old">Password Lama</label>
                    <input type="password" name="old" class="form-control" id="old" placeholder="Password Lama">
                    {!! $errors->first('old','<span class="help-block">:message</span>') !!}

                </div>
                <div class="form-group">
                    <label class="control-label" for="new">Password</label>
                    <input type="password" name="new" class="form-control" id="new" placeholder="Password Baru">
                    {!! $errors->first('new','<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    <input type="password" name="konfirmasi" class="form-control" placeholder="Konfirmasi Password Baru">
                    {!! $errors->first('konfirmasi','<span class="help-block">:message</span>') !!}

                </div>
                <div class="btn-group btn-group-lg btn-group-justified " role="group">
                    <div class="btn-group" role="group">
                    <a href="" role=" button" class="btn btn-group btn-danger" style="color: #fff;">Batal</a>
                    </div>
                    <div class="btn-group" role="group">
                    {!! Form::submit('Ubah Password', ['class' => 'form-control btn btn-primary', 'role' => 'group']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

