<?php

namespace stjo\Http\Controllers;

use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;

class KategorialController extends Controller
{
    //
    public function index($kategorial)
    {
        //untuk testing string
        //dd(snake_case($kategorial));
        //untuk kategorial agak sulit karena urinya bakal mengandung '('
        //jadi harus dicari dulu posisi (
        $posisi = strpos($kategorial, '(');

        if($posisi !== false)
        {
            //karakter ditemukan
            //berarti ada tanda ')'
            //jadi kita cari lagi posisi kedua
            $posisi2 = strpos($kategorial,')');

            //$posisi2 pasti ada jadi tidak perlu lagi mengecek keberhasilan fungsi $posisi2
            //jadi kita ambil panjang nya

            $posisi1= $posisi+1;
            $pjgString = $posisi2 - $posisi1;

            //ambil substing yang dibutuhkan untuk memanggil nama file vie

            $filename = substr($kategorial,$posisi1,$pjgString);

        } else {
            //karakter tidak ditemukan
            //langsung ubah menjadi snake_case cth: perkumpulan_doa_narwastu
            $kategorial = snake_case($kategorial);
            //pecahkan kalimat jadi array
            $strArray = explode('_',$kategorial);
            //hitung ukuran array
            $sise = sizeof($strArray);

            $filename = $strArray[$sise-1];
        }

        //filename sudah ditemukan so we return view
        return view('kategorial.' . $filename);



    }
}
