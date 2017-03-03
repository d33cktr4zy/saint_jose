
<div class="form-group">
    <input type="hidden" name="username" value="{!! $input['username'] !!}">
    <input type="hidden" name="email" value="{!! $input['email'] !!}">
    <input type="hidden" name="idumat" value="{!! $input['idumat'] !!}">

    <div class="col-xs-2 text-right">
        {!! Form::label('namaDepan', 'Nama Depan', ['class' => 'control-label']) !!}
    </div>
    <div class="col-xs-4">
        {!! Form::text('namaDepan', Request::old('namaDepan'), ['class' => 'form-control', 'id' => 'namaDepan', 'placeholder' => 'Nama Depan']) !!}
        {!! $errors->first('namaDepan','<span class="help-block">:message</span>') !!}
    </div>
    <div class="col-xs-4">
        {!! Form::text('namaBelakang', Request::old('namaBelakang'), ['class' => 'form-control', 'id'=>'namaBelakang', 'placeholder' => 'Nama Belakang']) !!}
        {!! $errors->first('namaBelakang','<span class="help-block">:message</span>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-xs-2 text-right">
        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
    </div>
    <div class="col-xs-4">
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder'=>'Password']) !!}
        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
    </div>
    <div class="col-xs-4">
        {!! Form::password('password-konfirm', ['class' => 'form-control', 'id' => 'password-konfirm','placeholder'=>'Konfirmasi Password']) !!}
        {!! $errors->first('password-konfirm','<span class="help-block">:message</span>') !!}
    </div>
</div>
<div class="form-group">
    {{--data from last form--}}
    <div class="col-xs-2 text-right">
        {!! Form::label('tempatLahir', 'Tempat/Tanggal Lahir', ['class' => 'control-label']) !!}
    </div>
    <div class="col-xs-2">
        {!! Form::text('tempatLahir', Request::old('tempatLahir'), ['class' => 'form-control', 'id'=>'tempatLahir', 'placeholder'=>'Tempat Lahir']) !!}
        {!! $errors->first('tempatLahir','<span class="help-block">:message</span>') !!}
    </div>
    <div class="col-xs-3">
        <div class="input-group date" id="dt1">
            {!! Form::text('tglLahir', null, ['class' => 'form-control']) !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    </div>
    <div class="col-xs-5">
        <div class="radio-inline">
            <label class="radio-inline">
                <input type="radio" name="jk">Laki-laki
            </label>
            <label class="radio-inline">
                <input type="radio" name="jk">Perempuan
            </label>
            {!! $errors->first('jk','<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<!--datepicker Script-->
<script type="text/javascript">
    $(function(){
        $("#dt1").datetimepicker({
            locale: 'id',
            format: "DD/MM/YYYY",
            useCurrent: true,

        });
    });
</script>
<!-- end date picker script -->
<div class="form-group">
    <div class="col-sm-2 text-right">
        {!! Form::label('alamat', 'Alamat', ['class' => 'control-label']) !!}
    </div>
    <div class="col-sm-8">
        {!! Form::text('alamat', null, ['class' => 'form-control', 'id'=>'alamat', 'placeholder'=>'Alamat']) !!}
        {!! $errors->first('alamat','<span class="help-block">:message</span>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-2 text-right">
        {!! Form::label('kota', 'Kota', ['class' => 'control-label']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::text('kota', null, ['class' => 'form-control', 'id'=>'kota', 'placeholder'=>'Kota']) !!}
        {!! $errors->first('kota','<span class="help-block">:message</span>') !!}
    </div>
    <div class="col-sm-2 text-right">
        {!! Form::label('kodepos', 'Kode Pos', ['class' => 'control-label']) !!}
    </div>
    <div class="col-sm-2">
        {!! Form::text('kodepos', null, ['class' => 'form-control', 'maxlength'=>'5', 'id'=>'kodepos','placeholder'=>'Kode Pos']) !!}
        {!! $errors->first('kodepos','<span class="help-block">:message</span>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="checkbox">
            <label>
                {!! Form::checkbox('setuju', '1', null,  ['id' => 'setuju']) !!}
                Dengan ini saya menyetujui peraturan yang ada pada situs ini
            </label>
            {!! $errors->first('setuju','<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
        {!! Form::submit('Daftar', ['class' => 'btn btn-block btn-danger form-control']) !!}
    </div>
</div>
{!! Form::close() !!}