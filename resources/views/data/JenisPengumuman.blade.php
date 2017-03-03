@extends('template.utama')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                @include('errors.loginErrors')
                @include('addons.adminMenu')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h1>Manajemen Pengumuman</h1>
                <hr style="display: block;">
                <h2 style="display: block;">Jenis Pengumuman</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                @if(isset($edit))
                    {!! Form::open(['role'=>'form', 'route'=>['updateJenisPengumuman',$jPengEdit->id_jns_pengumuman], 'method'=>'post']) !!}
                @else
                    {!! Form::open(['role'=>'form', 'route'=>'buatJenisPengumuman', 'method'=>'post']) !!}
                @endif
                <div class="form-group">
                    <label class="control-label" for="jns_pengumuman">Jenis Pengumuman</label>
                    @if(isset($edit))
                        <input type="text" class="form-control" id="jns_pengumuman" placeholder="Jenis Pengumuman" name="jns_pengumuman" value="{!! $jPengEdit->jns_pengumuman !!}">
                    @else
                        <input type="text" class="form-control" id="jns_pengumuman" placeholder="Jenis Pengumuman" name="jns_pengumuman">
                    @endif

                    {!! $errors->first('jns_pengumuman', '<span class="help-block">:message</span>') !!}
                    @if(isset($edit))
                        {!! Form::hidden('id',$jPengEdit->id_jns_pengumuman) !!}
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label crsa-selected" for="keterangan">Deskripsi Kategori</label>
                    @if(isset($edit))
                        <textarea class="form-control" rows="4" id="keterangan" name="keterangan">{!! $jPengEdit->keterangan !!}</textarea>
                    @else
                        <textarea class="form-control" rows="4" id="keterangan" name="keterangan"></textarea>
                    @endif

                </div>
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-danger">Batal</button>
                    @if(isset($edit))
                        <button type="submit" class="btn btn-primary" name="edit" value="edit">Simpan</button>
                    @else
                        <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
                    @endif

                </div>
                {!! Form::close() !!}
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Jenis Pengumuman</th>
                                <th>Keterangan</th>
                                <th>Jumlah Post</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $jenisPengumuman)

                                <tr>
                                    <td>{!! $jenisPengumuman->id_jns_pengumuman !!}</td>
                                    <td>{!! $jenisPengumuman->jns_pengumuman !!}</td>
                                    <td>{!! $jenisPengumuman->keterangan !!}</td>
                                    <td>
                                        {!! $jenisPengumuman->pengumuman->count() !!}
                                    </td>
                                    <td>
                                        <a href="{!! url(route('editJenisPengumuman',[$jenisPengumuman->id_jns_pengumuman])) !!}"><i class="fa fa-pencil"></i></a>
                                        &nbsp;
                                        <a href="#" data-href="{!! route('deleteJenisPengumuman',[$jenisPengumuman->id_jns_pengumuman]) !!}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="pager list-inline">
                                @if(null !== $data->previousPageUrl())
                                    <li class="previous">
                                        <a href="{!! $data->previousPageUrl() !!}">Previous</a>
                                    </li>
                                @endif

                                @if(null !== $data->nextPageUrl())
                                    <li class="next">
                                        <a href="{!! $data->nextPageUrl() !!}">Next</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
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
                    <p>Anda akan menghapus record.</p>
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

//                        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                    });
                </script>
            </div>
        </div>
    </div>
@endsection