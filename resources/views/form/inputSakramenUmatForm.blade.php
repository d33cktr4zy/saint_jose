@extends('template.utama')

@section('content')
    <div class="container-fluid">
        <div class="row" id="adminMenu">
            <div class="col-xs-12">
                @include('addons.adminMenu')
            </div>
        </div>

        <div class="row" id="judulHalaman">
            <div class="col-xs-12">
                <h1 style="display: block;">Manajemen Sakramen Umat</h1>
                <hr />
            </div>
        </div>

        <div class="row" id="formIsian">
            <div class="col-xs-10">
                <form role="form">
                    <div class="row">
                        <div class="form-group form-inline col-xs-3">
                            <label class="control-label" for="exampleInputEmail1">
                                Nama Umat
                            </label>
                        </div>
                        <div class="form-group col-xs-3">
                            <select id="formInput115" class="form-control">
                                <option value="1">ID Umat</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" class="form-control" id="formInput128" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-3">
                            <label class="control-label" for="formInput150">Jenis Sakramen</label>
                        </div>
                        <div class="form-group col-xs-3">
                            <select id="formInput160" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-6">
                            <label class="control-label">Field label</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group form-inline">
                                <label class="control-label" for="tgl">Tanggal</label>
                            </div>
                        </div>
                        <div class="col-xs-2 col-lg-1">
                            <div class="form-group form-inline">
                                <input type="text" class="form-control" id="tgl" size="2" maxlength="2" placeholder="Tgl">
                            </div>
                        </div>
                        <div class="col-xs-2 col-lg-1">
                            <div class="form-group form-inline">
                                <input type="text" class="form-control" id="bln" placeholder="Bln" size="2" maxlength="2">
                            </div>
                        </div>
                        <div class="col-xs-4 col-lg-2">
                            <div class="form-group form-inline">
                                <input type="text" class="form-control" id="thn" placeholder="Tahun" size="4" maxlength="4">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-3">
                            <label class="control-label" for="formInput200">Pemberi Sakramen</label>
                        </div>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" placeholder="Placeholder text" size="2" maxlength="2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-3">
                            <label class="control-label" for="formInput200">Tempat Menerima</label>
                        </div>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" placeholder="Placeholder text" size="2" maxlength="2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-3">
                            <label class="control-label" for="formInput200">No. Sertifikat</label>
                        </div>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" placeholder="Placeholder text" size="2" maxlength="2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-offset-6 col-xs-4">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger">Batal</button>
                                <button type="button" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{--Tabel Sakramen Permandian--}}
        <div class="row">
            <div class="col-xs-12">
                <h3 style="display: block;">Daftar Penerima Sakramen Permandian</h3>
                <hr />
                <table class="table col-xs-12">
                    <thead>
                    <tr style="display: table-row;">
                        <th>Nama</th>
                        <th>Tgl Sakramen</th>
                        <th>Lingkungan</th>
                        <th>Alamat</th>
                        <th style="display: table-cell;">Pembeli</th>
                        <th style="display: table-cell;">Tempat Menerima</th>
                        <th style="display: table-cell;">No. Sertifikat</th>
                        <th style="display: table-cell;">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="display: table-row;">
                        <td>1</td>
                        <td>Mark</td>
                        <td>St. Theresia</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td class="text-center">
                            <i class="fa fa-pencil"></i>
                            &nbsp;
                            <i class="fa fa-trash-o"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td class="text-center">
                            <i class="fa fa-pencil"></i>
                            &nbsp;
                            <i class="fa fa-trash-o"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td class="text-center">
                            <i class="fa fa-pencil"></i>
                            &nbsp;
                            <i class="fa fa-trash-o"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{--Tabel Sakramen Krisma--}}
        <div class="row">
            <div class="col-md-4">
                <h3 style="display: block;">Daftar Penerima Sakramen Krisma</h3>
                <hr>
                <table class="table" style="display: table;">
                    <thead>
                    <tr style="display: table-row;">
                        <th>Nama</th>
                        <th>Tgl Sakramen</th>
                        <th>Lingkungan</th>
                        <th>Alamat</th>
                        <th style="display: table-cell;">Pembeli</th>
                        <th style="display: table-cell;">Tempat Menerima</th>
                        <th style="display: table-cell;">No. Sertifikat</th>
                        <th style="display: table-cell;">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="display: table-row;">
                        <td>1</td>
                        <td>Mark</td>
                        <td>St. Theresia</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td class="text-center" style="display: table-cell;">
                            <i class="fa fa-pencil" style="display: inline-block;"></i>
                            &nbsp;
                            <i class="fa fa-trash-o" style="display: inline-block;"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td class="text-center">
                            <i class="fa fa-pencil"></i>
                            &nbsp;
                            <i class="fa fa-trash-o"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td class="text-center">
                            <i class="fa fa-pencil"></i>
                            &nbsp;
                            <i class="fa fa-trash-o"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{--Table Sakramen Perkawinan--}}
        <div class="row">
            <div class="col-md-4">
                <h3 style="display: block;">Daftar Penerima Sakramen Perkawinan</h3>
                <hr>
                <table class="table" style="display: table;">
                    <thead>
                    <tr style="display: table-row;">
                        <th>Nama</th>
                        <th>Tgl Sakramen</th>
                        <th>Lingkungan</th>
                        <th>Alamat</th>
                        <th style="display: table-cell;">Pembeli</th>
                        <th style="display: table-cell;">Tempat Menerima</th>
                        <th style="display: table-cell;">No. Sertifikat</th>
                        <th style="display: table-cell;">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="display: table-row;">
                        <td>1</td>
                        <td>Mark</td>
                        <td>St. Theresia</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td>xxxxxxxxxxxxxxxxx</td>
                        <td class="text-center" style="display: table-cell;">
                            <i class="fa fa-pencil" style="display: inline-block;"></i>
                            &nbsp;
                            <i class="fa fa-trash-o" style="display: inline-block;"></i>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td class="text-center">
                            <i class="fa fa-pencil"></i>
                            &nbsp;
                            <i class="fa fa-trash-o"></i>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td class="text-center">
                            <i class="fa fa-pencil"></i>
                            &nbsp;
                            <i class="fa fa-trash-o"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection