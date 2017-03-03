<div class="row">
	<a class="btn btn-danger btn-block">Kalender Kegiatan</a>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-8">
			<div id="sideCal"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function () {
		$('#sideCal').datetimepicker({
			inline: true,
			sideBySide: true,
			format: 'LL',
			locale: 'id'
		});
	});
</script>

@section('topScripts')
	{!! Html::script('//code.jquery.com/jquery-2.1.1.min.js') !!}
	{!! Html::script('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js') !!}
	{!! Html::script('//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js') !!}
@endsection
