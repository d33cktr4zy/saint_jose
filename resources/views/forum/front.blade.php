@extends('template.utama')

@section('content')
{{--	{!! dd($kat) !!}--}}
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<h1 style="display: block;">Forum Komunikasi Gereja Katolik St. Joseph</h1>
			<hr style="display: block;">

		@if(null === Auth::id())
			<p style="display: block;">Mohon<a href="{!! url('login') !!}">Login</a>/<a href="{!! url('registrasi') !!}">Daftar</a>terlebih dahulu untuk dapat berinteraksi dalam forum gereja</p>
		@endif
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-bordered table-condensed" id="forum">
				<thead class="th-forum" style="display: table-header-group;">
				<tr style="display: table-row;  ">
					<th style="width: 70%; display: table-cell;">Forum</th>
					<th style="text-align:center; width:8%">T.S.</th>
					<th style="text-align:center; width:8%">Post</th>
					<th style="text-align:center; width:14%">Pos Baru</th>
				</tr>
				</thead>
				<tbody style="display: table-row-group;">
@foreach($kate->all() as $Kategori)
				<tr class="kategori" style="">
					<td colspan="4"><a href="{!! route('forumTopikList',[$Kategori->id_kategori]) !!}" style="color: #fff;">{!! $Kategori->nm_kategori !!}</a></td>
				</tr>
				@if(null !== $Kategori->topiks)
				@foreach($Kategori->topiks->sortBy('waktu_buat_topik')->take(4) as $topik)
				<tr>
					<td class="topik"><span class="topikTitle"><a href="{!! route('forumThread', [$Kategori->id_kategori,$topik->id_topik]) !!}">{!! $topik->nm_topik !!}</a></span><br/>
						<span class="topikDesc">
							{!! str_limit($topik->desc_topic,100,'...') !!}
						</span>

					</td>
					<td class="topikCount"><a href="{!! route('userProfile', $topik->id_pembuat) !!}">{!! \stjo\Model\User::where('id', $topik->id_pembuat)->pluck('username') !!}</a></td>
					<td class="postCount">{!! \stjo\Model\ForumPost::where('id_forum_topik', $topik->id_topik)->count() !!}</td>
					<td class="newPost">
						{{ \stjo\Model\ForumPost::where('id_forum_topik',$topik->id_topik)
						->orderBy('wkt_kirim', 'DESC')
						->first()->pluck('wkt_kirim')
						}}
					</td>
				</tr>
				@endforeach
					@endif
@endforeach
				</tbody>
			</table>
		</div>
	</div>

</div>
@endsection