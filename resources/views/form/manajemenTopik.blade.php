@extends('template.utama')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                @include('addons.adminMenu')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h1>Manajemen Forum</h1>
                <hr style="display: block;">
                <h2 style="display: block;">Forum Topik</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                {!! Form::open(['role'=>'form']) !!}
                <div class="form-group">
                    <label class="control-label" for="namaKategori">Nama Topik</label>
                    @if(isset($edit))
                        <input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori" name="namaKategori" value="{!! $katEdit->nm_kategori !!}">
                    @else
                        <input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori" name="namaKategori">
                    @endif

                    {!! $errors->first('namaKategori', '<span class="help-block">:message</span>') !!}
                    @if(isset($edit))
                        {!! Form::hidden('id',$katEdit->id_kategori) !!}
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label crsa-selected" for="desc">Deskripsi Kategori</label>
                    @if(isset($edit))
                        <textarea class="form-control" rows="4" id="desc" name="desc">{!! $katEdit->kat_desc !!}</textarea>
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
            <div class="col-xs-8">
                <div class="row">
                    {!! Form::open(['route' => 'manTopik', 'method' => 'get']) !!}

                    <div class="col-xs-3 text-right">
                        <label class="control-label">
                            <h4 style="display: block;">Kategori Forum</h4>
                        </label>
                    </div>
                    <div class="col-xs-6">
                        <select class="form-control" name="fKat">
                            <option value="">---</option>
                            @foreach($fkat as $kate)
                            <option value="{!! $kate->id_kategori !!}">{!! $kate->nm_kategori !!}</option>
                            @endforeach


                            <option>3</option>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <button type="submit" class="btn btn-warning btn-block">Pilih Kategori</button>
                    </div>
                {!! Form::close() !!}
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Last Post</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topik as $top)

                            <tr>
                                <td>{!! $top->id_topik !!}</td>
                                <td>{!! $top->nm_topik!!}</td>
                                <td>{!! $top->desc_topik !!}</td>
                                <td>@if(!is_null($top->id_post_last))
                                        {!! $top->id_post_last !!}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/forum/kategori/{!! $top->id_kategori !!}"><i class="fa fa-pencil"></i></a>
                                    &nbsp;
                                    <a href="#" data-href="/admin/forum/kategori/{!! $top->id_kategori !!}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="pager list-inline">
                            <li class="previous">
                                <a href="{!! $topik->previousPageUrl() !!}">Previous</a>
                            </li>

                            <li class="next">
                                <a href="{!! $topik->nextPageUrl() !!}">Next</a>
                            </li>
                        </ul>
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

                        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                    });
                </script>
            </div>
        </div>
    </div>
@stop