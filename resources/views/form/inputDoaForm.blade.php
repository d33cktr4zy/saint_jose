@extends('template.utama')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h1 style="display: block;">Input Doa Mingguan</h1>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form role="form">
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tema Doa">
                </div>
                <div class="row">
                    <div class="col-xs-1">
                        <div class="form-group form-inline">
                            <label class="control-label" for="tgl">Tanggal</label>
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <div class="form-group form-inline">
                            <input type="text" class="form-control" id="tgl" size="2" maxlength="2" placeholder="Tgl">
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <div class="form-group form-inline">
                            <input type="text" class="form-control" id="bln" placeholder="Bln" size="2" maxlength="2">
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group form-inline">
                            <input type="text" class="form-control" id="thn" placeholder="Tahun" size="4" maxlength="4">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label crsa-selected">Isi Doa</label>
                    <textarea class="form-control" rows="10" id="formInput83"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Rangkuman (Jika Perlu)</label>
                    <textarea class="form-control" rows="3" id="formInput83"></textarea>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group"  role="group"><button type="button" class="btn btn-danger btn-block">Batal</button></div>
                           <div class="btn-group" role="group"> <button type="button" class="btn btn-block btn-primary " >Simpan</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection