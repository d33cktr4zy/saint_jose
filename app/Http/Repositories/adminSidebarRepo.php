<?php
namespace stjo\Http\Repositories;

use Carbon\Carbon;
use stjo\Model\Keluarga;
use stjo\Model\Lingkungan;
use stjo\Model\Umat;
use stjo\Model\User;

class adminSidebarRepo {

    /**
     * Hitung Jumlah User
     * ---------------------------
     * @return int
     */
    public function hitungUser(){
        $jumlahUser = User::all()->count();

        return $jumlahUser;
    }


    /**
     * @return mixed
     */
    public function satuMingguTerakhir(){
        $userLoginSatuMingguTerakhir = User::where('kunjungan_terakhir','>', Carbon::now()->subWeek())->count();

        return $userLoginSatuMingguTerakhir;
    }

    public function hitungUmat(){
        $jumlahUmat = Umat::all()->count();

        return $jumlahUmat;
    }

    public function hitungKeluarga(){
        $jumlahKeluarga = Keluarga::all()->count();

        return $jumlahKeluarga;
    }

    public function hitungLingkungan(){
        $lingkungan = Lingkungan::all();

        return $lingkungan;
    }

}