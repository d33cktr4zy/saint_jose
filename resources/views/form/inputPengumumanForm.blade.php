@extends('template.utama')

@section('topScripts')
    {!! Html::script('js/moment-with-locales.js') !!}
    {!! Html::script('js/bootstrap-datetimepicker.js') !!}
@endsection

@section('content')
    <div class="container-fluid">
        @include('addons.adminMenu')
        <h1>Input Pengumuman</h1>
        <hr>

        {!! Form::open(['route' => 'simpanPengumuman', 'method' => 'post', 'role'=>'form']) !!}
            <div class="form-group">
                <label class="control-label" for="judul">Judul Pengumuman</label>
                <input type="text" class="form-control" id="judul" placeholder="Judul Pengumuman" name="judul">
            </div>
            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12 col-xs-12" style="display: block;">
                    <div class="col-md-5" style="display: block;">
                        <div class="form-group form-inline" style="display: block;">
                            <label class="control-label" for="tglMulai">Tanggal</label>
                            <div class="input-group date" id="tanggal">
                                {!! Form::text('tanggal',null,['class' => 'form-control']) !!}
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#tanggal').datetimepicker({
                                    locale: 'id',
                                    format: "DD-MM-YYYY",
                                    useCurrent: true,
                                });
                            });
                        </script>
                    </div>
                    <div class="col-md-6" style="display: block;">
                        <div class="form-group form-inline" style="display: block;">
                            <label class="control-label" for="jenis">Jenis Pengumuman</label>
                            <select id="jenis" class="form-control" name="jenis">
                                <option value=""> --- </option>
                                @foreach($jenis as $jPeng)
                                    <option value="{!! $jPeng->id_jns_pengumuman !!}">{!! $jPeng->jns_pengumuman !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"><div class="col-xs-12"><textarea class="form-control input-lg" rows="12" name="isi"></textarea></div></div>

            <div class="row">

                <div class="col-xs-12"><div class="btn-group btn-group-justified">
                        <div class="btn-group"><button type="button" class="btn btn-danger left">Batal</button></div>
                        <div class="btn-group"><button type="submit" class="btn btn-success right">Kirim</button></div>
                    </div></div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
