<div class="">
    <div class="row">
        <div class="panel"
             style="text-align: right; margin-right: 0px;">
            <div class="panel-body">
                <div class="panel-heading"
                     style="display: block;">
                    <h4>User Statistik</h4>
                </div>
                <table class="table">
                    <tr style="display: table-row;">
                        <td>User Terdaftar</td>
                        <td>{!! $userStat !!}</td>

                    </tr>
                    <tr style="display: table-row;">
                        <td>User Login 1Minggu</td>
                        <td>{!! $lastWeek !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel"
             style="text-align: right; margin-right: 0px;">
            <div class="panel-body">
                <div class="panel-heading"
                     style="display: block;">
                    <h4>Statistik Umat</h4>
                </div>
                <table class="table">
                    <tbody style="display: table-row-group;">
                    <tr style="display: table-row;">
                        <td>Jumlah Umat
                            <br>
                        </td>
                        <td style="display: table-cell;">{!! $umatStat !!}</td>
                    </tr>
                    <tr style="display: table-row;">
                        <td style="display: table-cell;">Jumlah Keluarga</td>
                        <td style="display: table-cell;">{!! $jumlahKeluarga !!}</td>
                    </tr>
                    <tr style="display: table-row;">
                        <td style="display: table-cell;">Lingkungan</td>
                        <td style="display: table-cell;">
                            <br>
                        </td>
                    </tr>
                    @foreach($umatLingkungan as $uLing)
                    <tr style="display: table-row;">
                        <td style="display: table-cell;">{!! $uLing->nm_lingkungan !!}</td>
                        <td style="display: table-cell;">{!! $uLing->umat->count() !!}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<div class="panel"--}}
             {{--style="text-align: right; margin-right: 0px;">--}}
            {{--<div class="panel-body">--}}
                {{--<div class="panel-heading"--}}
                     {{--style="display: block;">--}}
                    {{--<h4>Statistik Konten</h4>--}}
                {{--</div>--}}
                {{--<table class="table">--}}
                    {{--<tbody>--}}
                    {{--<tr style="display: table-row;">--}}
                        {{--<td>Pengumuman Terakhir</td>--}}
                        {{--<td>XXX</td>--}}
                    {{--</tr>--}}
                    {{--<tr style="display: table-row;">--}}
                        {{--<td>Berita Terakhir</td>--}}
                        {{--<td>XXX</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
