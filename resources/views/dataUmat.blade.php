@extends('template.utama')

@section('additionalJS')
    <script src="js/jquery-1.11.2.min.js"></script>

    <script>
        $(function() {
            $('input[name=dataRange]').on('click init-post-format', function() {
                $('#data-filter').fadeToggle($('#data-range').prop('checked'));
            }).trigger('init-post-format');
        });
    </script>
@endsection

@section('content')
    <div class="col-xs-9">
        {{--Filters --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Data Umat Stasi St. Yoseph Dr. Mansyur</h1>
                    <hr />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    @include('errors.loginErrors')
                    {!! Form::open(['action' => 'UmatController@filters', 'method' => 'post', 'role' => 'form', 'name' => 'filters']) !!}

                        <label class="control-label">Pilih cakupan data yang ingin ditampilkan</label>
                        <div class="radio" id="data-range">
                            <label class="control-label">
                                <input type="radio" name="dataRange" value="filtered">
                                Filter
                            </label>
                            <label class="control-label">
                                <input type="radio" name="dataRange" value="all" >
                                Data Keseluruhan
                            </label>
                        </div>
                        <div class="panel" id="data-filter">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label class="control-label">
                                                <input type="checkbox" name="lingCheck">
                                                Lingkungan
                                            </label>
                                        </div>
                                        <select class="form-control" name="lingOption">
                                            @foreach($lingkungan as $ling)
                                                {{--{!! dd($ling) !!}--}}
                                            <option value="{!! $ling->id_lingkungan !!}">{!! $ling->nm_lingkungan !!}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label class="control-label">
                                                <input type="checkbox" name="jkCheck">
                                                Jennis Kelamin
                                            </label>
                                        </div>
                                        <select class="form-control" name="jkOption">
                                            <option value="1">Laki-Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="checkbox">
                                            <label class="control-label">
                                            	{!! Form::checkbox('umur', null, null,  ['id' => 'umur', ]) !!}
                                            	Umur
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-5">
                                                {!! Form::text('muda', null, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-xs-1">
                                                <p> - </p>
                                            </div>
                                            <div class="col-xs-5">
                                                {!! Form::text('tua', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="checkbox">
                        <label class="control-label">
                            <input type="checkbox" value="1" name="kelompok">                                    Kelompokkan Berdasarkan Keluarga
                        </label>
                    </div>
                </div>
                <div class="col-xs-3">
                    <button type="submit" class="btn btn-danger">
                        Tampilkan Data
                    </button>
                </div>
                </form>
            </div>
        </div>

 {{--Tabel Starts here--}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <table class="table">
                        <thead>
                        <tr style="display: table-row;">
                            <th>No</th>
                            <th>Nama</th>

                            <th>Jenis Kelamin</th>

                            <th>Tgl Lahir</th>
                            <th>Lingkungan</th>
                            <th>Alamat</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($umats as $key=>$umat)
                            {{--{!! dd($umat) !!}--}}
                            <tr>
                                <td>{!! ($umats->perPage() * $umats->currentPage()) - $umats->perPage() + $key +1 !!}</td>
                                <td>
                                    {!! $umat->nama_depan !!} {!! $umat->nama_belakang !!}
                                </td>

                                <td>
                                    @if($umat->jk == 1)
                                        Laki-laki
                                    @elseif($umat->jk == 2)
                                        Perempuan
                                    @endif
                                </td>
                                <td>
                                    {!! \Carbon\Carbon::createFromFormat('Y-m-d',$umat->tanggal_lahir)->formatLocalized('%d %b %Y') !!}
                                </td>
                                <td>
                                    {!! $umat->lingkungan->nm_lingkungan !!}
                                </td>
                                <td>
                                    {!! $umat->alamat !!}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {!! $umats ->render() !!}
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-3">
    @include('addons.publicSidebar');

    </div>
    @ENDSECTION
