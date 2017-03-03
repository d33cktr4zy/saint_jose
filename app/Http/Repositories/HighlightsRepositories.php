<?php
namespace stjo\Http\Repositories;

use Carbon\Carbon;
use stjo\Model\Berita;
use stjo\Model\ForumPost;
use stjo\Model\Pengumuman;

class HighlightsRepositories {

    public function highlightsPengumuman () {
        //
        $pengumuman = Pengumuman::all();
        $pengs = $pengumuman->sortByDesc('tgl_pengumuman')->groupBy('tgl_pengumuman')->take(3);

        return $pengs;
    }

    public function highlightsBerita(){
        $berita = Berita::all();
        $beri = $berita
            ->sortBy('waktu_berita')
            ->groupBy(function($waktu){
                return Carbon::parse($waktu->waktu_berita)
                    ->format('Y-m-d');
            },'desc')->take(3)
        ;

        return $beri;
    }

    public function highlightsForum(){
        $posts = ForumPost::all();
        $latest = $posts->sortBy('wkt_kirim')->take(3);

        return $latest;
    }
}