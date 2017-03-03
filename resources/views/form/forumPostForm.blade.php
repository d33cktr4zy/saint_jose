@extends('template.utama')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <p>Breadcrumb</p>
        </div>
        <div class="col-md-12">
            <h1 style="display: block;" class="">Kirim Post Baru</h1>
            <hr />
            <form role="form">
                <div class="form-group">
                    <label class="control-label" for="judul">Judul Kiriman</label>
                    <input type="text" class="form-control" id="judul" placeholder="Judul Kiriman" value>
                    <hr />
                </div>
                <div class="form-group">
                    <label class="control-label" for="isi">Isi Kiriman</label>
                    <textarea class="form-control input-lg" rows="10" id="isi"></textarea>
                </div>
                <div class="col-xs-offset-9 col-xs-3 text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    @endsection