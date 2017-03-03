@extends('template.utama')

@section('additionalJS')
    <script src="/js/jquery-1.11.2.min.js"></script>

    <script>
        $(function() {
            $('input[name=dataRange]').on('click init-post-format', function() {
                if($('#data-range1').prop('checked')) {
                    $('#data-filter').fadeIn();
                }else if($('#data-range2').prop('checked')) {
                    $('#data-filter').fadeOut();
                }
            }).trigger('init-post-format');
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('errors.loginErrors')
            @include('addons.adminMenu')
        </div>
    </div>
    <div class="col-xs-9">
        {{--Filters --}}
        <div class="container-fluid">
            {!! Form::open(['route' => 'lihatUmatAdmin', 'method' => 'get', 'role' => 'form', 'name' => 'filters']) !!}
            <div class="row">
                <div class="col-xs-12">
                    <h1>Data Umat Stasi St. Yoseph Dr. Mansyur</h1>
                    <hr />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label class="control-label">
                        Pilih cakupan data yang ingin ditampilkan
                    </label>
                    <div class="radio" id="data-range">
                        <label class="control-label">
                            @if(\Request::get('dataRange') == "all")
                            <input type="radio" name="dataRange" value="filtered" id="data-range1">
                                @else
                            <input type="radio" name="dataRange" value="filtered" id="data-range1" checked>
                                @endif
                            Filter
                        </label>
                        <label class="control-label">
                            @if(\Request::get('dataRange') == "all")
                            <input type="radio" name="dataRange" value="all" id="data-range2" checked>
                                @else
                            <input type="radio" name="dataRange" value="all" id="data-range2">
                                @endif
                            Data Keseluruhan
                        </label>
                    </div>
                    <div class="panel" id="data-filter">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label class="control-label">
                                            @if(\Request::get('lingCheck') == "on")
                                            <input type="checkbox" name="lingCheck" checked>
                                            @else
                                            <input type="checkbox" name="lingCheck">
                                                @endif
                                            Lingkungan
                                        </label>
                                    </div>
                                    <select class="form-control" name="lingOption">
                                        @foreach($lingkungan as $ling)
                                            @if(\Request::get('lingOption') == $ling->id_lingkungan)
                                            <option selected value="{!! $ling->id_lingkungan !!}">{!! $ling->nm_lingkungan !!}</option>
                                            @else
                                            <option value="{!! $ling->id_lingkungan !!}">{!! $ling->nm_lingkungan !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label class="control-label">
                                            @if(\Request::get('jkCheck') == "on")
                                            <input type="checkbox" name="jkCheck" checked>
                                            @else
                                            <input type="checkbox" name="jkCheck">
                                            @endif
                                            Jennis Kelamin
                                        </label>
                                    </div>
                                    <select class="form-control" name="jkOption">
                                        @if(\Request::get('jkOption') == 1)
                                        <option selected value="1">Laki-Laki</option>
                                        @else
                                        <option value="1">Laki-Laki</option>
                                        @endif

                                        @if(\Request::get('jkOption') == 2)
                                        <option selected value="2">Perempuan</option>
                                            @else
                                        <option value="2">Perempuan</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <div class="checkbox">
                                        <label class="control-label">
                                            @if(\Request::get('umur') == "on")
                                                <input type="checkbox" name="umur" checked>
                                            @else
                                                <input type="checkbox" name="umur">
                                            @endif
{{--                                            {!! Form::checkbox('umur', null, null,  ['id' => 'umur', ]) !!}--}}
                                            Umur
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            {!! Form::text('muda', $uMuda, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-xs-1">
                                            <p> - </p>
                                        </div>
                                        <div class="col-xs-5">
                                            {!! Form::text('tua', $uTua, ['class' => 'form-control', 'value' => $uTua]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    {{-- <div class="checkbox">
                         <label class="control-label">
                             <input type="checkbox" value="1" name="kelompok">                                    Kelompokkan Berdasarkan Keluarga
                         </label>
                     </div>--}}
                </div>
                <div class="col-xs-3">
                    <button type="submit" class="btn btn-danger">
                        Tampilkan Data
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        {{--Tabel Starts here--}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <table class="table">
                        <thead>
                        <tr style="display: table-row;">
                            <th>No</th>
                            <th>Nama</th>

                            <th>Jenis Kelamin</th>

                            <th>Tgl Lahir</th>
                            <th>Lingkungan</th>
                            <th>Alamat</th>
                            <th>Aksi</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($umats as $key=>$umat)
                            {{--{!! dd($umat) !!}--}}
                            <tr>
                                <td>{!! ($umats->perPage() * $umats->currentPage()) - $umats->perPage() + $key +1 !!}</td>
                                <td>
                                    {!! $umat->nama_depan !!} {!! $umat->nama_belakang !!}
                                </td>

                                <td>
                                    @if($umat->jk == 1)
                                        Laki-laki
                                    @elseif($umat->jk == 2)
                                        Perempuan
                                    @endif
                                </td>
                                <td>
                                    {!! \Carbon\Carbon::createFromFormat('Y-m-d',$umat->tanggal_lahir)->formatLocalized('%d %b %Y') !!}
                                </td>
                                <td>
                                    {!! $umat->lingkungan->nm_lingkungan !!}
                                </td>
                                <td>
                                    {!! $umat->alamat !!}
                                </td>
                                <td>
                                    <a href="{!! url(route('editUmatAdmin',[$umat->id_umat])) !!}"><i class="fa fa-pencil"></i></a>
                                    &nbsp;
                                    <a href="#" data-href="{!! route('deleteUmatAdmin',[$umat->id_umat]) !!}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {!! $umats ->render() !!}
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-3">
        @include('addons.adminSidebar');

    </div>
    {{--modal confirmasi--}}
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <p>Anda akan menghapus Pengumuman.</p>
                    <p>Anda yakin?</p>
                    <p class="debug-url"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
                <script>
                    $('#confirm-delete').on('show.bs.modal', function(e) {
                        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
