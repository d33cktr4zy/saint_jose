<div class="panel panel-danger sidebar-right-item">
    <div class="panel-heading text-center">
        <h5><strong>Pengumuman Terakhir</strong></h5>
    </div>
    <div class="panel-body">
        <em> Daftar Pengumuman Terbaru</em>
    </div>
    <div class="">
        <ul>
            {{--{!! dd($PengumumanLima) !!}--}}
            @foreach($PengumumanLima as $PengumumanSatu)
                <li> <a href="{!! url('pengumuman/'.$PengumumanSatu['id_pengumuman']) !!}">{!! str_limit($PengumumanSatu['tema_pengumuman'],30,'...')!!}</a>
                    <br />
                    <span class="small pull-right">{!! \Carbon\Carbon::parse($PengumumanSatu['tgl_pengumuman'])->toDateString('d-M-Y') !!}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>