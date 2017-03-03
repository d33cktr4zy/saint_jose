<div class="panel panel-danger sidebar-right-item">
    <div class="panel-heading text-center">
        <h5><strong>Bacaan Mingguan</strong></h5>
    </div>
    <div class="panel-body">
        <em> Daftar Bacaan terakhir</em>
    </div>
    <div class="">
        <ul>
            {{--{!! dd($bacaan) !!}--}}
            @foreach($bacaan as $bacan)
                <li>
                    <a href="{!! url('bacaan/'.$bacan['id_bacaan']) !!}">{!! str_limit($bacan['tema_bacaan'],30,'...')!!}</a>
                    <br />
                    <span class="small pull-right">{!! \Carbon\Carbon::parse($bacan['tgl_bacaan'])->toDateString('d-M-Y') !!}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
