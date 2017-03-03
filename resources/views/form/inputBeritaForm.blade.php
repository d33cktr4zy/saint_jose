@extends('template.utama')

@section('topScripts')
    {!! Html::script('js/moment-with-locales.js') !!}
    {!! Html::script('js/bootstrap-datetimepicker.js') !!}
@endsection

@section('content')
<div class="container-fluid">
    @include('addons.adminMenu')
    <h1>Input Berita</h1>
    <hr>
    @if(isset($edit))
    {!! Form::open(['route' => ['updateBerita',$data->id_berita], 'method' => 'post', 'role'=>'form']) !!}
    @else
    {!! Form::open(['route' => 'simpanBeritaBaru', 'method' => 'post', 'role'=>'form']) !!}
    @endif
        <div class="form-group">
            @if(isset($edit))
            <input type="hidden" name="id_sender" value="{!! $data->id_pengirim !!}">
            @else
            <input type="hidden" name="id_sender" value="{!! Auth::user()->id !!}">
            @endif
            <b>Judul Berita</b>
            <br>
                @if(isset($edit))
                <input type="text" class="form-control" id="judul" value="{!! $data->jdl_berita !!}" name="judul">
                @else
                <input type="text" class="form-control" id="judul" placeholder="Judul Berita" name="judul">
                    @endif
        </div>
        <div class="row">
            <div class="col-xs-6" style="display: block;">
                <div class="form-group">
                    <label class="control-label" for="kategorial">Kategorial</label>
                    <select id="kategorial" class="form-control" name="kategorial">
                        <option value="" selected> - </option>
                        @foreach($kats as $kate )
                            @if(isset($edit))
                                @if($data->id_kategorial == $kate->id_kategorial)
                                    <option selected value="{!! $kate->id_kategorial !!}">{!! $kate->nm_kategorial !!}</option>
                                @else
                                    <option value="{!! $kate->id_kategorial !!}">{!! $kate->nm_kategorial !!}</option>
                                @endif
                            @else
                                <option value="{!! $kate->id_kategorial !!}">{!! $kate->nm_kategorial !!}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-6" style="display: block;">
                <div class="form-group" style="display: block;">
                    <label class="control-label" for="sakramen">Sakramen</label>
                    <select id="sakramen" class="form-control" name="sakramen">
                        <option value="" selected> - </option>
                        @foreach($saks as $sak)
                            @if(isset($edit))
                                @if($data->id_sakramen == $sak->id_sakramen)
                                    <option selected style="display: block;" value="{!! $sak->id_sakramen !!}">{!! $sak->nm_sakramen !!}</option>
                                @else
                                    <option style="display: block;" value="{!! $sak->id_sakramen !!}">{!! $sak->nm_sakramen !!}</option>
                                @endif
                            @else
                                <option style="display: block;" value="{!! $sak->id_sakramen !!}">{!! $sak->nm_sakramen !!}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-xs-12" style="padding-bottom: 15px;">
             @if(isset($edit))
            <textarea class="form-control input-lg" rows="12" name="isi">{!! $data->isi_berita !!}</textarea>
                 @else
            <textarea class="form-control input-lg" rows="12" name="isi"></textarea>
                @endif
            </div>
        </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group form-inline">
                <label class="control-label" for="waktu">Waktu Berita</label>
                <div class="input-group date" id="waktu">
                    <input type="text" class="form-control" name="waktu" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>

        @if(isset($edit))
            <script type="text/javascript">
                $(function(){
                    $('#waktu').datetimepicker({
                        format: "DD-MM-YYYY HH:mm",
                        sideBySide: true,
                        defaultDate: "{!! \Carbon\Carbon::parse($data->waktu_berita) !!}"
                    });
                });
            </script>
        @else
            <script type="text/javascript">
                $(function(){
                    $('#waktu').datetimepicker({
                        format: "DD-MM-YYYY HH:mm",
                        sideBySide: true
                    });
                });
            </script>
        @endif
    </div>
    <div class="row">
        <div class="col-xs-4 col-xs-offset-8">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger">Batal</button>
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<div class="row">
    <div class="col-xs-12">
        <p></p>
    </div>
</div>
    @endsection