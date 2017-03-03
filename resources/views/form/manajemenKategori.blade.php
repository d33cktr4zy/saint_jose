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
                <h1>Manajemen Forum</h1>
                <hr style="display: block;">
                <h2 style="display: block;">Forum Kategori</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                @if(isset($edit))
                {!! Form::open(['role'=>'form', 'route'=>['updateKategori',$fKatEdit->id_kategori], 'method'=>'post']) !!}
                @else
                {!! Form::open(['role'=>'form', 'route'=>'buatKategori', 'method'=>'post']) !!}
                @endif
                    <div class="form-group">
                        <label class="control-label" for="namaKategori">Nama Kategori</label>
                        @if(isset($edit))
                            <input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori" name="namaKategori" value="{!! $fKatEdit->nm_kategori !!}">
                        @else
                            <input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori" name="namaKategori">
                        @endif

                        {!! $errors->first('namaKategori', '<span class="help-block">:message</span>') !!}
                        @if(isset($edit))
                        {!! Form::hidden('id',$fKatEdit->id_kategori) !!}
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label crsa-selected" for="desc">Deskripsi Kategori</label>
                        @if(isset($edit))
                            <textarea class="form-control" rows="4" id="desc" name="desc">{!! $fKatEdit->kat_desc !!}</textarea>
                        @else
                            <textarea class="form-control" rows="4" id="desc" name="desc"></textarea>
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
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Last Post</th>
                            <th>Jumlah Post</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fKat as $fKategori)

                        <tr>
                            <td>{!! $fKategori->id_kategori !!}</td>
                            <td>{!! $fKategori->nm_kategori !!}</td>
                            <td>{!! $fKategori->kat_desc !!}</td>
                            <td>@if(!is_null($fKategori->id_last_post))
                                {!! $fKategori->id_last_post !!}
                                    @else
                                --
                                    @endif
                            </td>
                            <td>
                                {!! $fKategori->posts->count() !!}
                            </td>
                            <td>
                                <a href="{!! url(route('editKategori',[$fKategori->id_kategori])) !!}"><i class="fa fa-pencil"></i></a>
                                &nbsp;
                                <a href="#" data-href="{!! route('deleteKategori',[$fKategori->id_kategori]) !!}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="pager list-inline">
                            @if(null !== $fKat->previousPageUrl())
                            <li class="previous">
                                <a href="{!! $fKat->previousPageUrl() !!}">Previous</a>
                            </li>
                            @endif

                            @if(null !== $fKat->nextPageUrl())
                            <li class="next">
                                <a href="{!! $fKat->nextPageUrl() !!}">Next</a>
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