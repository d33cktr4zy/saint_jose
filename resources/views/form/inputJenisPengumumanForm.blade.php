@extends('template.utama')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h1 style="display: block;">Jenis Pengumuman</h1>
            <hr style="display: block;">
        </div>
    </div>
    <div class="row">
        <form role="form">
            <div class="row">
                <div class="form-group col-xs-5">
                    <label class="control-label" for="exampleInputEmail1">Email address
                    </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Jenis Pengumuman">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-12">
                    <label class="control-label" for="formInput42">Field label</label>
                    <textarea class="form-control" rows="3" id="formInput42"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-xs-offset-11">
                    <button type="submit" class="btn">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr style="display: table-row;">
                        <th>ID</th>
                        <th>Jenis Pengumuman</th>
                        <th>Keterangan</th>
                        <th class="text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td class="text-center">
                        <i class="fa fa-pencil fa-2x" style="display: inline-block;"></i>
                        &nbsp;
                        <i class="fa fa-ban fa-2x" style="display: inline-block;"></i>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td class="text-center">
                        <i class="fa fa-pencil fa-2x" style="display: inline-block;"></i>
                        &nbsp;
                        <i class="fa fa-ban fa-2x" style="display: inline-block;"></i>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td class="text-center">
                        <i class="fa fa-pencil fa-2x" style="display: inline-block;"></i>
                        &nbsp;
                        <i class="fa fa-ban fa-2x" style="display: inline-block;"></i>
                        <br>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    @endsection