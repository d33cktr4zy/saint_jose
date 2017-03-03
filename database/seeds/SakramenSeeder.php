<?php

use Illuminate\Database\Seeder;

class SakramenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Hapus Data
        DB::table('tbl_sakramen')->truncate();

	    //Isi Data
	    DB::table('tbl_sakramen')->insert([
		    ['nm_sakramen'=>'Sakramen Permandian'],
		    ['nm_sakramen'=>'Sakramen Krisma'],
		    ['nm_sakramen'=>'Sakramen Perkawinan'],
	                                      ]);
    }
}
