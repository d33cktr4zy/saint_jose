@extends('template.utama')


@section('content')
    <div class="container-fluid"
         id="news">
        <div class="row">
            {{--{!! dd($berita)  !!}--}}

            <div class="col-xs-12">
                <h5 style="margin-bottom: 3px;">{!! $berita->waktu_berita !!}</h5>

                <h1 class="pull-left col-xs-12"
                    style="margin-top: 4px; margin-bottom: -20px; ">{!! $berita->jdl_berita !!}</h1>
                <h5 class="pull-right">{!! $berita->penulis->username !!} ({!! $berita->penulis->nama_depan !!} {!! $berita->penulis->nama_belakang !!})</h5>
            </div>
        </div>
        <div class="row">
            <hr style="margin-top: 3px; background-color: #222222;" />
        </div>
        <div class="row">
            <div class="col-xs-12">
                <img src="file:///C:/Program%20Files%20(x86)/Pinegrow%20Web%20Designer/placeholders/img8.jpg"
                     width="200"
                     class="pull-left"
                     style="margin-right: 10px; margin-bottom: 10px; display: inline-block;">

                {!! $berita->isi_berita !!}
{{--                    {!! dd(Auth::check()) !!}--}}

                @if(Auth::check())
                @if(Auth::user()->user_level == 1)
                    <a href="{!! url('/admin/berita/edit/' . $berita->id_berita) !!}"><button class="btn btn-primary pull-right">Edit</button></a>
                @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <a href="{!! action('BeritaController@index') !!}"><button class="link btn-danger btn-block">Lihat Semua Berita</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="pager">
                    <li class="previous">
                        <a href="{!! url('/berita/' . ($berita->id_berita - 1)) !!}"
                           class="">Previous</a>
                    </li>
                    <li class="next">
                        <a href="{!! url('/berita/' . ($berita->id_berita + 1)) !!}"
                           class="">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection