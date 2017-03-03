<?php
namespace stjo\Http\Repositories;

class publicSidebarRepo {

    public function ambilBacaan()
    {
        /**
         * Ambil Bacaan
         */
        $bacaan = \stjo\Model\Bacaan::all()->sortBy('tgl_bacaan')->reverse()->take(5);

        return $bacaan;

    }


    /**
     * @return static
     */
    public function ambilPengumuman()
    {
        $pengumuman = \stjo\Model\Pengumuman::all()->sortBy('tgl_pengumuman')->reverse()->take(5);

        return $pengumuman;
    }



}