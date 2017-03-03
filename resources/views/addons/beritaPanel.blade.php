<!-- hilight Berita -->

<div class="row"
     id="hiliteBerita">
    @foreach(stjo\Model\Berita::orderBy('waktu_berita','desc')->take(3)->get() as $berita)
                {{--{!! dd($berita) !!}--}}
        <div class="list-group col-xs-4 ringkasBerita"
             id="">
            <a class="list-group-item list-group-item-danger"
               href="/berita/{!! $berita->id_berita !!}">
                <h5 class="list-group-item-heading">{!! str_limit($berita->jdl_berita,30,'...') !!}</h5>
                <span class="pull-right"><small>{!! \Carbon\Carbon::parse($berita->waktu_berita)->toDateString() !!}</small></span>
            </a>

            <div class="list-group-item list-item-body"><p>{!! str_limit($berita->isi_berita,70,'...') !!}
                    <a href="{!! url('berita/' . $berita->id_berita) !!}">
                        Read More...
                    </a>
                </p>
            </div>
        </div>
    @endforeach
</div>

<!-- hilight Berita -->