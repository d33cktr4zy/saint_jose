@extends('template.utama')

@section('topScripts')
    {!! Html::script('js/moment-with-locales.js') !!}
    {!! Html::script('js/bootstrap-datetimepicker.js') !!}
@endsection

@section('content')
    <div class="container-fluid">
        @if(Auth::user()->user_level == 1)
            {{--its admin editing his own profile--}}
            @include('addons.adminMenu')
        @endif
        <div class="row">
            <div class="col-md-12">
                <h1>Edit User Data</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-9">{{-- this is the start of left side form --}}
                {{--Sanity Check sudah dilakukan di controller method, jadi ga perlu lagi membedakan route untuk update--}}
                {{--Hopefully, tanpa credential yang pas user ga bisa buka halaman ini.--}}
                {!! Form::open(['route' => ['updateUserAdmin', $user->id], 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @if(isset($sendiri))
                    <input type="hidden" name="sendiri" value="{{$sendiri}}" />
                @endif
                <input type="hidden" value="{!! $user->id !!}" name="id">

                <div class="row">{{--Start of Username row --}}
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-2 text-right">
                                <label for="username" class="control-label">Username</label>
                            </div>
                            <div class="col-xs-5">
                                <input class="form-control" id="username" placeholder="Username" type="text" name="username" value="{!! $user->username !!}" disabled>
                            </div>
                            <div class="col-xs-5">
                                <input class="form-control" id="userid" placeholder="UserID" type="text"  value="{!! $user->id !!}" disabled>
                                User ID
                            </div>
                        </div>
                    </div>
                </div>{{-- end username row --}}

                <div class="row"> {{--start password row --}}
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-2 text-right">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <div class="col-xs-5 text-center">
                                    <a href="" class="btn btn-block btn-success" style="color: #fff;">Reset Password</a>
                            </div>

                            <div class="col-xs-5">
                                @if(Auth::user()->user_level == 1)
                                    <select class="form-control" id="selUmat" name="idUmat">
                                        @if($user->id_umat === null)
                                            <option  value="" selected="selected">---</option>
                                        @else
                                            <option  value="">---</option>
                                        @endif

                                        @foreach(\stjo\Model\Umat::all() as $umat)
                                            @if($umat->id_user == $user->id)
                                                <option  value="{!! $umat->id_umat !!}" selected="selected">{!! $umat->id_umat . " - " . $umat->nama_depan . " " . $umat->nama_belakang !!}</option>
                                            @endif
                                            @if($umat->id_user === null)
                                                <option  value="{!! $umat->id_umat !!}">{!! $umat->id_umat . " - " . $umat->nama_depan . " " . $umat->nama_belakang !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @else
                                    @if(null !== $user->id_umat)
                                    <input class="form-control" id="selUmat" name="idUmat" type="text"  value="{!! $user->id_umat !!}" disabled>
                                    @else
                                    <input class="form-control" id="selUmat" name="idUmat" type="text"  value="---" disabled>
                                    @endif
                                @endif
                                ID Umat
                            </div>

                        </div>
                    </div>
                </div> {{-- end of password row --}}

                <div class="row">{{-- start of email row --}}
                    <div class="col-xs-12"><div class="form-group">
                            <div class="col-xs-2 text-right">
                                <label for="email" class="control-label">E-Mail</label>
                            </div>
                            <div class="col-xs-8">
                                <input class="form-control" name="email" id="email" placeholder="Alamat Email" type="email" value="{!! $user->email !!}" nama="email">
                            </div>
                        </div>
                    </div>
                </div>{{-- end email row --}}

                <div class="row">{{-- start of nama row --}}
                    <div class="form-group">
                        <div class="col-xs-2 text-right">
                            <label for="namaDepan" class="control-label">Nama</label>
                        </div>
                        <div class="col-xs-5">
                            <input class="form-control" name="namaDepan" id="namaDepan" placeholder="Nama Depan" type="text" value="{!! $user->nama_depan !!}" nama="namaDepan">
                        </div>
                        <div class="col-xs-5">
                            <input class="form-control" id="namaBelakang" placeholder="Nama Belakang" type="text" value="{!! $user->nama_belakang !!}" name="namaBelakang">
                        </div>
                    </div>
                </div>{{--end nama row --}}

                <div class="row">{{-- start for tempat tanggal lahir row --}}
                    <div class="form-group">
                        <div class="col-xs-2 text-right">
                            <label for="tempatLahir" class="control-label">Tempat/Tanggal Lahir</label>
                        </div>

                        <div class="col-xs-2">
                            <input class="form-control" id="tempatLahir" placeholder="Tempat Lahir" type="text" name="tempatLahir" value="{!! $user->tempat_lahir !!}">
                        </div>

                        <div class="col-xs-3">
                            <div class="input-group date" id="dt1">
                                <input class="form-control" name="tglLahir" type="text" value="{!! \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') !!}">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                {!! $errors->first('tglLahir','<span class="help-block">:message</span>') !!}
                            </div>

                            <script type="text/javascript">
                                $(function () {
                                    $("#dt1").datetimepicker(
                                            {
                                                locale: 'id',
                                                format: "DD-MM-YYYY",
                                            }
                                    );
                                });
                            </script>
                        </div>

                        <div class="col-xs-4">
                            <div class="radio">
                                <label class="radio-inline">
                                    @if($user->jk == 1)
                                        <input name="jk" type="radio" value="1" checked="checked">
                                    @else
                                        <input name="jk" type="radio" value="1">
                                    @endif
                                    Laki-laki
                                </label>

                                <label class="radio-inline">
                                    @if($user->jk == 2)
                                        <input name="jk" type="radio" value="2" checked="checked">
                                    @else
                                        <input name="jk" type="radio" value="2">
                                    @endif
                                    Perempuan
                                </label>
                            </div>
                        </div>

                    </div>
                </div>{{-- end tempat tanggal lahir row --}}

                <div class="row">{{-- start of alamat row --}}
                    <div class="form-group">
                        <div class="col-xs-2 text-right">
                            <label for="alamat" class="control-label">Alamat</label>
                        </div>
                        <div class="col-xs-10">
                            <input class="form-control" id="alamat" placeholder="Alamat" type="text" name="alamat" value="{!! $user->alamat !!}">
                        </div>
                    </div>
                </div>{{-- end row Alamat --}}

                <div class="row">{{-- start of kota row --}}
                    <div class="form-group">
                        <div class="col-xs-2 text-right">
                            <label for="kota" class="control-label">Kota</label>
                        </div>
                        <div class="col-xs-3">
                            <input class="form-control" id="kota" placeholder="Kota" type="text" name="kota" value="{!! $user->kota !!}">
                        </div>
                        <div class="col-xs-2 text-right">
                            <label for="kodePos" class="control-label">Kode Pos</label>
                        </div>
                        <div class="col-xs-3">
                            <input class="form-control" id="kodePos" placeholder="Kode Pos" type="text" name="kodePos" value="{!! $user->kode_pos !!}">
                        </div>
                    </div>
                </div>{{-- end of kota row --}}

                @if(Auth::user()->user_level == 1)
                <div class="row">{{-- start of User Level row --}}
                    <div class="form-group">
                        <div class="col-xs-2 text-right">
                            <label for="uLevel" class="control-label">User Level</label>
                        </div>
                        <div class="col-xs-3">
                            <select class="form-control" id="sel1" name="level">
                                @if($user->user_level == 0)
                                    <option  value="0" selected="selected">User</option>
                                @else
                                    <option  value="0" >User</option>
                                @endif

                                @if($user->user_level == 1)
                                    <option selected="selected" value="1">Admin</option>
                                @else
                                    <option value="1">Admin</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>{{-- end of User Level row --}}
                @endif

                <div class="row">{{-- start of User Button row --}}
                    <div class="form-group">
                        <div class="col-xs-offset-8 col-xs-2">
                            @if(isset($sendiri))
                                {{--kalau ini profile sendiri, artinya dia datang dari profilenya--}}
                                <a href="{!! route('userProfile',[Auth::user()->id]) !!}"><button type="button" class="btn btn-block btn-danger">Batal</button></a>
                                <input type="hidden" name="sendiri" value="{{$sendiri}}" />
                            @else
                                <a href="{!! route('listUser') !!}"><button type="button" class="btn btn-block btn-danger">Batal</button></a>
                            @endif
                        </div>
                        <div class="col-xs-2">
                            <button type="submit" class="btn btn-block btn-default">Simpan</button>
                        </div>
                    </div>
                </div>{{-- end of User Button row --}}
            </div>
            {{-- this is the end of the left side form --}}
            {!! Form::close() !!}


            {{-- This is the start of The right side form for image --}}
            <div class="col-xs-2">
                <div class="row text-center lead">
                    @if($user->path_gambar === null)
                        <img src="{!! url('http://lorempixel.com/200/150/people')  !!}" height="200" width="150" class="img-rounded">
                    @else
                        <img src="{!! url('/images/user/'.$user->path_gambar)  !!}" height="200" width="150" class="img-rounded">
                    @endif
                </div>
                {!! Form::open(['route'=>['uploadFoto',$user->id],'method'=>'POST', 'files'=>true]) !!}
                <div class="control-group">
                    <div class="controls">
                        {!! Form::file('image') !!}
                        <input type="submit" class="btn btn-danger btn-block" value="Ganti Foto" name="submit">
                    </div>
                </div>
                {!! Form::close() !!}
            </div>{{-- This is the end of the form for image --}}
        </div>{{--this is the end of the row --}}
    </div>














    </div>

@endsection