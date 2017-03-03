<!-- TopNav mulai disini -->
<div class="row vertical-center" id="top-nav">
	<div class="col-xs-5">
		<!-- decide login or not -->
		<div id="sessionNote" class="">
			@if(Auth::check())
					<!-- Loggedin -->
			<p>Hi,
				<a href="{!! route('userProfile', [Auth::user()->id]) !!}">
					{!! Auth::user()->nama_depan !!}
					{!! Auth::user()->nama_belakang !!}
				</a>!!
			   |
				<a href="{!! url('logout') !!}">
					Logout
				</a>

				{{--Admin Check--}}
               @if(Auth::user()->user_level == 1)
					   <!-- Ini seorang Admin -->
			   &nbsp; <a href="{!! route('userProfile', [\Auth::user()->id]) !!}">Manajemen Situs</a>
				@endif
			</p>
			@else
					<!-- Not Logged in-->
			<p>
				<a href="{!! url('login') !!}">
					Login
				</a>
				/
				<a href="{!! route('daftarSatu') !!}">
					Daftar
				</a>
			</p>
			@endif
		</div>
	</div>
</div>
<!-- TopNav Selesai -->