@extends('template.utama')

@section('content')


@if(Auth::user()->user_level == 1)
        <!--admin menu -->
<div class="row">
    <div class="col-xs-12">
        @include('addons.adminMenu')
    </div>
</div>
<!-- end admin menu -->
<!-- divide the column -->
<div class="col-xs-12">
    <div class="col-xs-9">
        @endif
        <div class="row">
            <div class="col-xs-12">
                <h1 style="display: block;">Profile Pengguna</h1>
                <hr/>
            </div>
        </div>
        <div class="row">
            @if(Session::has('success'))
                {{--{!! dd(Session::get('success')) !!}--}}
                <div class="col-xs-12 alert-box success">
                    <div class="alert alert-danger">
                        <strong>{!! Session::get('success') !!}</strong>
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if(Session::has('errors'))
                @include('errors.loginErrors')
            @endif
            {{--                {!! dd(Session::all()) !!}--}}
            <div class="col-xs-12">
                <h3>Selamat Datang, {!! Auth::user()->nama_depan !!} {!! Auth::user()->nama_belakang !!}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <div class="row text-center lead">
                    @if(Auth::user()->path_gambar === null)
                        <img src="{!! url('http://lorempixel.com/200/150/people')  !!}" height="200" width="150"
                             class="img-rounded">
                    @else
                        <img src="{!! url('/images/user/'.Auth::user()->path_gambar)  !!}" height="200" width="150"
                             class="img-rounded">
                    @endif
                </div>
                {!! Form::open(['route'=>['uploadFoto',\Auth::user()->id],'method'=>'POST', 'files'=>true]) !!}
                <div class="control-group">
                    <div class="controls">
                        {!! Form::file('image') !!}
                        <input type="submit" class="btn btn-danger btn-block" value="Ganti Foto" name="submit">
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-xs-9">
                <div class="row">
                    <form role="form" class="form-horizontal">
                        <div class="datashow">
                            <div class="row">
                                <div class="col-sm-3 text-right">
                                    <p align="right" class="pull-right" style="margin-right: 5px;"><strong>Username
                                            :</strong></p>
                                </div>
                                <div class="col-sm-4">
                                    <p>{!! Auth::user()->username !!}</p>
                                </div>
                                <div class="col-xs-5 text-right">
                                    <h6>(User ID : {!! Auth::user()->id !!}) | (ID Umat
                                        : {!! null !== Auth::user()->id_umat ? Auth::user()->id_umat : '----' !!})</h6>
                                </div>
                            </div>
                        </div>

                        <div class="datashow">
                            <div class="row">
                                <div class="col-sm-3 text-right">
                                    <p align="right" class="pull-right" style="margin-right: 5px;"><strong>Password
                                            :</strong></p>
                                </div>
                                <div class="col-sm-4">
                                    <p align="right" class="pull-right" style="margin-right: 5px;"><a
                                                href="{!! url('/user/password/'. Auth::user()->id ) !!}"><strong>Ubah
                                                Password</strong></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="datashow">
                            <div class="row">
                                <div class="col-sm-3 text-right">
                                    <p align="right" class="pull-right" style="margin-right: 5px;"><strong>e-Mail
                                            :</strong></p>
                                </div>
                                <div class="col-sm-5">
                                    <p>{!! Auth::user()->email !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="datashow">
                            <div class="row">
                                <div class="col-sm-3 text-right">
                                    <p align="right" class="pull-right" style="margin-right: 5px;"><strong>Alamat
                                            :</strong></p>
                                </div>
                                <div class="offset-2 col-sm-5">
                                    <p>{!! Auth::user()->alamat !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="datashow">
                            <div class="row">
                                <div class="col-sm-3 text-right">
                                    <p align="right" class="pull-right" style="margin-right: 5px;"><strong>Kota
                                            :</strong></p>
                                </div>
                                <div class="col-xs-3">
                                    <p>{!! Auth::user()->kota !!}</p>
                                </div>
                                <div class="col-xs-3">
                                    <p align="right" class="pull-right" style="margin-right: 5px;"><strong>Kode Pos
                                            :</strong></p>
                                </div>
                                <div class="col-xs-3">
                                    <p>{!! Auth::user()->kode_pos !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="datashow">
                            <div class="row">
                                <div class="  col-xs-3 col-xs-offset-9">
                                    <a href="{!! route('editUser',[Auth::user()->id]) !!}">
                                        <button type="button" class="btn btn-danger btn-block">Ubah Data</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
        @if(Auth::user()->user_level == 1)<!--second column for sidebar -->
            <div class="col-xs-3 pull-right">
                @include('addons.adminSidebar')
             </div>
        @endif<!-- closing pembagian -->
</div>
@endsection