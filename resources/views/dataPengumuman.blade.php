@extends('template.utama')


@section('content')
    <div class="container-fluid"
         id="news">
        <div class="row">
            {{--{!! dd($berita)  !!}--}}

            <div class="col-xs-12">
                <h5 style="margin-bottom: 3px;">{!! $berita->tgl_pengumuman !!}</h5>

                <h1 class="pull-left col-xs-12"
                    style="margin-top: 4px; margin-bottom: -20px; ">{!! $berita->tema_pengumuman !!}</h1>
                <h5 class="pull-right"></h5>
            </div>
        </div>
        <div class="row">
            <hr style="margin-top: 3px; background-color: #222222;" />
        </div>
        <div class="row">
            <div class="col-xs-12">

                {!! $berita->isi_pengumuman !!}
                {{--                    {!! dd(Auth::check()) !!}--}}

                @if(Auth::check())
                    @if(Auth::user()->user_level == 1)
                        <a href="{!! url('/admin/berita/edit/' . $berita->id_pengumuman) !!}"><button class="btn btn-primary pull-right">Edit</button></a>
                    @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <a href="{!! action('PengumumanController@index') !!}"><button class="link btn-danger btn-block">Lihat Semua pengumuman</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="pager">
                    <li class="previous">
                        <a href="{!! url('/pengumuman/' . ($berita->id_pengumuman - 1)) !!}"
                           class="">Previous</a>
                    </li>
                    <li class="next">
                        <a href="{!! url('/pengumuman/' . ($berita->id_pengumuman + 1)) !!}"
                           class="">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection