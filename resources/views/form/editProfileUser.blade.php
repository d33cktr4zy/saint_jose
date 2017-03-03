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
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h3>Selamat Datang, {!! Auth::user()->nama_depan !!} {!! Auth::user()->nama_belakang !!}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <div class="row text-center lead">
                    <img src="@if(Auth::user()->path_gambar === null)
                    {!!  url('http://lorempixel.com/400/200/sports')!!}
                    @else
                    {!! url('/images/user/'.Auth::user()->path_gambar)  !!}
                    @endif.jpg" height="200" width="150" class="img-rounded">
                </div>
                <button type="button" class="btn btn-danger btn-block btn-lg">Ganti Foto</button>
            </div>
            <div class="col-xs-9">
                <div class="row">
                    <form role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <h4 class="label-profile">Username</h4>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{!! Auth::user()->username !!}">
                            </div>
                            <div class="col-xs-2">
                                <h6>(User ID : {!! Auth::user()->id !!})</h6>
                            </div>
                            <div class="col-xs-2">
                                <h6 >(ID Umat : {!! null !== Auth::user()->id_umat ? Auth::user()->id_umat : '----' !!})</h6>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <h4 class="label-profile">Password</h4>
                            </div>
                            <div class="col-sm-5">
                                <h4 class="label-profile"><a>Ubah Password</a></h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <h4 class="label-profile">e-Mail</h4>
                            </div>
                            <div class="offset-2 col-sm-5">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="alamat e-mail" value="{!! Auth::user()->email !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <h4 class="label-profile">Alamat</h4>
                            </div>
                            <div class="offset-2 col-sm-5">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat" value="{!! Auth::user()->alamat !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <h4 class="label-profile">Kota</h4>
                            </div>
                            <div class="offset-2 col-xs-4">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Kota" value="{!! Auth::user()->kota !!}">
                            </div>
                            <div class=" crsa-selected col-xs-2">
                                <h4 class="label-profile">Kode Pos</h4>
                            </div>
                            <div class="offset-2 col-xs-4">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Kode Pos" value="{!! Auth::user()->kode_pos !!}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="  col-xs-3 col-xs-offset-9">
                                    <button type="button" class="btn btn-danger btn-block">Ubah Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::user()->user_level == 1)
            <!--second column for sidebar -->
    </div>
                    <div class="col-xs-3">

                        {{--@include('addons.adminSidebar')--}}
                    </div>
        <!-- closing pembagian -->
           </div>
         </div>
        @endif
</div>

</div>
@endsection