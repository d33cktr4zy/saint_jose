@extends('template.utama')

@section('additionalJS')


@endsection
{{--{!! $detail['tanggal_lahir'] !!},--}}
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 style="display: block;">Input Data Umat</h1>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                @include('errors.loginErrors')
                {!! Form::open(['action' => 'UmatController@store', 'method' => 'post', 'files' => 'true', 'role' => 'form']) !!}
                	
                <form role="form">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="control-label" for="namaDepan">Nama Depan</label>
                                <input type="text" class="form-control" id="namaDepan" placeholder="Nama Depan" name="namaDepan">
                                {!! $errors->first('namaDepan','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="control-label" for="namaBelakang">Nama Belakang</label>
                                <input type="text" class="form-control" id="namaBelakang" placeholder="Nama Belakang" name="namaBelakang">
                                {!! $errors->first('namaBelakang','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="control-label" for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Alamat Email" value="" name="email">
                                {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label class="control-label" for="jk">Jenis Kelamin</label><br/>
                            <div class="radio-inline">
                                <label class="control-label">
                                    <span class="div-col-xs-6 btn"><input id="jk" type="radio" name="jk" value="1" checked="checked" class="radio pull-left">Laki-laki</span>
                                </label>
                                <label class="control-label div-col-xs-6">
                                    <span class="btn"><input id="jk" type="radio" name="jk" value="2" class="pull-right">Perempuan</span>
                                </label>
                                {!! $errors->first('jk','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label class="control-label" for="tempatLahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir" value="">
                                {!! $errors->first('tempatLahir','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <label class="control-label" for="tglLahir">Tanggal Lahir</label>
                            <div class="input-group date" id="dt1">
                                <input class="form-control" name="tglLahir" type="text" value="{!! \Carbon\Carbon::now() !!}">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                {!! $errors->first('tglLahir','<span class="help-block">:message</span>') !!}
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#dt1').datetimepicker({locale: 'id', format: "DD/MM/YYYY"});
                                });
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
                                {!! $errors->first('alamat','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="control-label" for="lingkungan">Lingkungan</label>
{{--                                {!! dd($lingkungan) !!}--}}
                                <select id="lingkungan" class="form-control" name="lingkungan">
                                    @foreach($lingkungan as $ling)

                                    <option value="{!! $ling->id_lingkungan !!}">{!! $ling->nm_lingkungan !!}</option>
                                        @endforeach
                                </select>
                                {!! $errors->first('lingkungan','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label class="control-label">Keluarga</label>
                            <div class="checkbox">
                                <label class="control-label">
                                    <input type="checkbox" name="is_kk" id="is_kk">Apakah Anda Kepala Keluarga
                                </label>
                            </div>
                            <div class="form-group" id="KK">
{{--                                {!! dd($keluarga) !!}--}}
                                <label class="control-label" for="namakk">Nama Kepala keluarga</label>
                                <select id="namakk" class="form-control" name="namakk">
                                    @foreach($keluarga as $kel)
{{--                                        {!!  dd($kel) !!}--}}
                                        @if(null !== $kel->kepalaKeluarga->id_umat)
                                    <option value="{!! $kel->kepalaKeluarga->id_umat !!}">{!! $kel->kepalaKeluarga->nama_depan . ' ' . $kel->kepalaKeluarga->nama_belakang !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {!! $errors->first('namakk','<span class="help-block">:message</span>') !!}
                            </div>
                            <script type="text/javascript">
                                $(document.getElementById('KK')).ready(function(){
                                    $(document.getElementById('is_kk')).attr('checked', false);
                                });
                                $(document).ready(function(){
                                    $(document.getElementById('is_kk')).change(function(){
                                        if(document.getElementById('is_kk').checked){
                                            $(document.getElementById('KK')).fadeOut();
                                        }else{
                                            $(document.getElementById('KK')).fadeIn();
                                        }
                                    });
                                });
                                //    Block
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="control-label" for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan">
                                {!! $errors->first('username','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="control-label" for="noTel">No. Telephone/ Handphone</label>
                                <input type="text" class="form-control" id="noTel" name="noTel" placeholder="No. Telp/ HP">
                                {!! $errors->first('noTel','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="foto" name="foto">Foto:</label>
                                <input type="file" id="foto" name="foto">
                                {!! $errors->first('file','<span class="help-block">:message</span>') !!}

                            </div>
                        </div>
                    </div>
                    <div class="row crsa-selected">
                        <div class="col-xs-12">
                            <div class="btn-group pull-right btn-group-justified">
                                {!! Form::submit('Simpan', ['name' => 'simpan', 'class' => 'btn btn-primary btn-lg btn-block', 'role' => 'button']) !!}
                                <a href="{!! URL::previous() !!}"><button name="batal" type="cancel" class="btn btn-danger btn-lg btn-block" role="button">Batal</button></a>
                            </div>
                        </div>
                    </div>

                <br/>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection