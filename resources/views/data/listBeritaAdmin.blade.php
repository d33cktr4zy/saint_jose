@extends('template.utama')

@section('content')
<div class="container">
    @include('errors.loginErrors')
    @include('addons.adminMenu')
    <div class="row">
        <div class="col-xs-12">
            <h1 style="display: block;">Manajemen Berita</h1>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'lihatBeritaAdmin', 'method' => 'get', 'role' => 'form', 'class' => 'form-normal']) !!}
                <div class="form-group">
                    <label class="control-label " for="data_range">Data range</label>
                    <div class="">
                        <div class="">
                            <div class="radio">
                                <label class="control-label">
                                    <input type="radio" name="data_range" value="semua">
                                    Semua Berita
                                </label>
                                <label class="control-label">
                                    <input type="radio" name="data_range" value="filter" checked="">
                                    Filtered
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="well" id="filter-well" data-pg-collapsed>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label class="">
                                            @if(\Request::get('fil1') == "kategorial")
                                            <input checked type="checkbox" value="kategorial" name="fil1">
                                            @else
                                            <input type="checkbox" value="kategorial" name="fil1">
                                            @endif
                                            <div class="form-group">
                                                <label class="control-label " for="kategorial">Kategorial</label>
                                                <div class="">
                                                    <select id="kategorial" class="form-control" name="kategorial">
                                                        <option value=""> --- </option>
                                                        @foreach($kats as $kategorial)
                                                            @if(\Request::get('kategorial') == $kategorial->id_kategorial)
                                                                <option value="{!! $kategorial->id_kategorial !!}" selected>{!! $kategorial->nm_kategorial !!}</option>
                                                            @else
                                                                <option value="{!! $kategorial->id_kategorial !!}">{!! $kategorial->nm_kategorial !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <div class=" ">
                                        <div class="checkbox">
                                            <label class="">
                                                @if(\Request::get('fil2') == "sakramen")
                                                <input checked type="checkbox" value="sakramen" name="fil2">
                                                @else
                                                <input type="checkbox" value="sakramen" name="fil2">
                                                @endif
                                                <div class="form-group">
                                                    <label class="control-label " for="sakramen">Sakramen</label>
                                                    <div class="">
                                                        <select id="sakramen" class="form-control" name="sakramen">
                                                            <option value=""> --- </option>
                                                            @foreach($saks as $sakramen)
                                                                @if(\Request::get('sakramen') == $sakramen->id_sakramen)
                                                            <option selected value="{!! $sakramen->id_sakramen !!}">{!! $sakramen->nm_sakramen !!}</option>
                                                                @else
                                                            <option value="{!! $sakramen->id_sakramen !!}">{!! $sakramen->nm_sakramen !!}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" ">
                        <div class="   text-right">
                            <button type="submit" class="btn">Submit</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Waktu Berita</th>
                    <th>Judul Berita</th>
                    <th>Isi Berita</th>
                    <th>Pengirim</th>
                    <th>Sakramen</th>
                    <th>Kategorial</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                @foreach($data as $dt)
                <tr>
                    <td>{!! $dt->id_berita !!}</td>
                    <td>{!! $dt->waktu_berita !!}</td>
                    <td>{!! $dt->jdl_berita !!}</td>
                    <td>{!! $dt->isi_berita !!}</td>
                    <td>{!! \stjo\Model\Berita::find($dt->id_berita)->penulis->username !!}</td>
                    @if($dt->id_sakramen === null)
                        <td> --- </td>
                    @else
                    <td>{!! \stjo\Model\Berita::find($dt->id_berita)->sakramen->nm_sakramen !!}</td>
                    @endif

                    @if($dt->id_kategorial === null)
                    <td> --- </td>
                        @else
                    <td>{!! \stjo\Model\Berita::find($dt->id_berita)->kategorial->nm_kategorial !!}</td>
                        @endif
                    <td>
                        <a href="{!! url(route('editBerita',[$dt->id_berita])) !!}"><i class="fa fa-pencil"></i></a>
                        &nbsp;
                        <a href="#" data-href="{!! url(route('deleteBerita',[$dt->id_berita])) !!}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-12">
            {!! $data->render() !!}
        </div>
    </div>
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
                    <p>Anda akan menghapus Berita.</p>
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
