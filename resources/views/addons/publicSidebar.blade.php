@section('topScripts')
    @parent
    {!! Html::script('js/moment-with-locales.js') !!}
    {!! Html::script('js/bootstrap-datetimepicker.js') !!}

@endsection

@include('addons.publicSidebarKalender')

<div class="row">
    <div class="col-xs-12">
    </div>
</div>

@include('addons.publicSidebarPengumuman')
<div class="row">
    <div class="col-xs-12">
    </div>
</div>

@include('addons.publicSidebarBacaan')
<div class="row">
    <div class="col-xs-12">
    </div>
</div>

@include('addons.publicSidebarData')

<div class="row">
    <div class="col-xs-12">
    </div>
</div>
