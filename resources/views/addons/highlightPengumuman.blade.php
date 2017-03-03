<div class="row" id="hilitePengumuman">
	<div class="col-xs-12">
		<hr><hr>
		@foreach($pengumuman as $umum => $val)

			<h4>Pengumuman tanggal, {!! \Carbon\Carbon::createFromFormat('Y-m-d',$umum)->formatLocalized('%A, %d %B %Y') !!} </h4>
			<hr/>
			@foreach($pengumuman[$umum] as $umums)
				<h5 style="color:#a02e12;" class="col-xs-8">{!! $umums['tema_pengumuman'] !!}</h5>
				<span class="col-xs-4 text-right">{!! $umums['tgl_pengumuman'] !!}</span>
				<p class="row col-xs-12">{!! str_limit($umums['isi_pengumuman'],200,'...') !!}
					<a href="{!! url('/pengumuman/'. $umums['id_pengumuman']) !!}"> Baca ...</a> </p>
			@endforeach
			<hr/>
		@endforeach
	</div>
	<div class="col-xs-12">
		<hr/>
		<hr/>
	</div>
</div>