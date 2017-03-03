<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="btn-group btn-group-justified">
                <ul class="dropdown-menu list-inline btn-group-justified"
                    role="menu"
                    aria-labelledby="dropdownMenu"
                    style="display: block;
                        position: inherit;
                        margin-bottom: 5px;
                        *width: 180px;">
                    <li class="dropdown-submenu">
                        <a tabindex="-1">Manajemen Konten <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a>Manajemen Forum</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! route('manKategori') !!}">Kategori</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('manTopik') !!}">Topik</a>
                                    </li>
                                    {{--<li>--}}
                                        {{--<a href="{!! action('ForumController@show') !!}">Post</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a>Manajeman Pengumuman</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! route('buatPengumuman') !!}">Buat Baru</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('lihatPengumumanAdmin') !!}">Lihat Pengumuman</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('lihatJenisPengumuman') !!}">Jenis Pengumuman</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a>Manajeman Berita</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! route('buatBerita') !!}">Buat Baru</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('lihatBeritaAdmin') !!}">Lihat Berita</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a>Manajeman Bacaan dan Doa</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! route('buatBacaan') !!}">Buat Baru</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('lihatBacaanAdmin') !!}">Lihat Bacaan</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a tabindex="-1">Manajemen Gereja <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a>Manajemen Umat</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! route('lihatUmatAdmin') !!}">Lihat data Umat</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('buatUmat') !!}">Tambah Umat</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a>Manajemen Lingkungan</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! route('dataLingkungan') !!}">Lihat Data Lingkungan</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('dataKeluarga') !!}">Lihat Data Keluarga</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a>Kegiatan</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! route('lihatKegiatan') !!}">Lihat kegiatan</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('buatKegiatan') !!}">Tambah Baru</a>
                                    </li>
                                </ul>
                            </li>
                            {{--<li class="dropdown-submenu">--}}
                                {{--<a href="#">Pengurus</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Manajemen Pengurus</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Pengurus Lingkungan</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a tabindex="-1">Manajemen User <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <a href="{!! route('listUser') !!}">Lihat Daftar User</a>
                            {{--<a href="{!! action('') !!}">Password Reset</a>--}}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
