<!-- Navbar Starts here-->
<div class="row vertical-center" id="navi-bar">
    <div class="col-xs-9" id="navi">
        <div class="btn-group btn-group-justified vertical-center">
            <ul class="dropdown-menu list-inline btn-group-justified" style="display: block;">
                <li>
                    <a tabindex="-1" href="{!! route('home') !!}">Home</a>
                </li>

                <li>
                    <a tabindex="-1" href="{!! route('forumMain') !!}">Forum</a>
                </li>

                <li class="dropdown-submenu">
                    <a tabindex="-1">Sakramen <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach ( $sakramen as $sak)
                            <li>
                                <a href="{!! route('sakramen',[camel_case($sak->nm_sakramen)]) !!}">
                                    {!! $sak->nm_sakramen !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="dropdown-submenu">
                    <a tabindex="-1">Kategorial <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach( $kat as $kategorial)
                            <li>
                                <a tabindex="-1" href="{!! route('kategorial', [camel_case($kategorial->nm_kategorial)]) !!}">
                                    {!! $kategorial->nm_kategorial !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="dropdown-submenu">
                    <a tabindex="-1">St. Joseph <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a tabindex="-1" href="{!! route('about', 'stasi') !!}">
                                Tentang Stasi St. Joseph Dr. Mansyur
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a tabindex="-1" href="{!! route('about', 'dps') !!}">
                                Dewan Pengurus Stasi
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-xs-3">
        {{--<div>--}}
        {{--<div class="form-group"--}}
        {{--id="searchBox">--}}
        {{--{!! Form::text('cari',null,['class' => 'form-control','placeholder' => 'Cari Berita']) !!}--}}

        {{--</div>--}}

        {{--</div>--}}
    </div>
</div>
<!-- Navbar Selesai -->