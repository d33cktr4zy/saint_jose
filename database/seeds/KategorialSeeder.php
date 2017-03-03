<?php

use Illuminate\Database\Seeder;

class KategorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hapus data dulu walaupun sudah ada
	    DB::table('tbl_kategorial')->truncate();

	    //Isi Data Awal
        DB::table('tbl_kategorial')->insert([
	        ['nm_kategorial'=>'Orang Muda Katolik (OMK)','id_ketua_kategorial'=>'1'],
	        ['nm_kategorial'=>'Anak Sekolah Minggu Katolik (ASMIKA)','id_ketua_kategorial'=>'1'],
	        ['nm_kategorial'=>'Anak Remaja Katolik (AREKA)','id_ketua_kategorial'=>'1'],
	        ['nm_kategorial'=>'Misdinar','id_ketua_kategorial'=>'1'],
	        ['nm_kategorial'=>'Perkumpulan Bapak-Bapak Katolik (KOMPAK)','id_ketua_kategorial'=>'1'],
	        ['nm_kategorial'=>'Perkumpulan Ibu-Ibu Kaotolik (PIK)','id_ketua_kategorial'=>'1'],
	        ['nm_kategorial'=>'Perkumpulan Doa Narwastu','id_ketua_kategorial'=>'1'],
                                           ]);
    }
}
