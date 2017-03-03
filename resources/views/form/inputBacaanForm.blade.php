@extends('template.utama')

@section('content')
<div class="container-fluid">
    <h1>Input Kegiatan</h1>
    <hr />
    <form role="form">
        <div class="form-group">
            <label class="control-label" for="exampleInputEmail1">Nama Kegiatan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kegiatan">
        </div>
        <div class="form-group form-inline">
            <label class="control-label" for="tglMulai">Tanggal</label>
            <input type="password" class="form-control form-tanggal" placeholder="Password" id="tglMulai">
            <input type="password" class="form-control form-tanggal" id="tglMulai " placeholder="Password">
            <input type="password" class="form-control form-tanggal" placeholder="Password">
        </div>
        <textarea class="form-control input-lg" rows="12"></textarea>
        <div class="form-group">
            <label class="control-label" for="formInput426">Field label</label>

            <textarea class="form-control" rows="3" id="formInput426"></textarea>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default">Batal</button>
            <button type="button" class="btn btn-default">Kirim</button>
        </div>
    </form>
</div>
    @endsection