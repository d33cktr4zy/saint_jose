@extends('template.utama')

@section('content')
<div class="container">
    @include('errors.loginErrors')
    @include('addons.adminMenu')
    <div class="row">
        <div class="col-xs-12">
            <h3>Daftar Pengumuman</h3>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'lihatPengumumanAdmin', 'method' => 'get', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    <label class="control-label   col-sm-3" for="jenis">Jenis Pengumuman</label>
                    <div class="col-sm-5">
                            {{--{!! dd(\Input::get('jenis')) !!}--}}
                        <select id="jenis" class="form-control" name="jenis">
                            <option value=""> Semua </option>
                            @foreach($jns as $jenis)
                                @if(\Input::get('jenis') == $jenis->id_jns_pengumuman)
                                    <option value="{!! $jenis->id_jns_pengumuman !!}" selected>{!! $jenis->jns_pengumuman !!}</option>
                                @else
                                    <option value="{!! $jenis->id_jns_pengumuman !!}">{!! $jenis->jns_pengumuman !!}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="  col-xs-3">
                        <button type="submit" class="btn btn-success">Tampilkan</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Pengumuman</th>
                    <th>Tema Pengumuman</th>
                    <th>Isi Pengumuman</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                @foreach($data as $dat)
                <tr>
                    <td>{!! $dat->id_pengumuman !!}</td>
                    <td>{!! $dat->tgl_pengumuman !!}</td>
                    <td>{!! $dat->tema_pengumuman !!}</td>
                    <td>{!! $dat->isi_pengumuman !!}</td>
                    <td>
                        @if($dat->id_jns_pengumuman == null)
                           none
                        @else
                            {!! $dat->id_jns_pengumuman !!}
                        @endif
                    </td>
                    <td>
                        <a href="{!! url(route('editPengumuman',[$dat->id_pengumuman])) !!}"><i class="fa fa-pencil"></i></a>
                        &nbsp;
                        <a href="#" data-href="{!! route('deletePengumuman',[$dat->id_pengumuman]) !!}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
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
