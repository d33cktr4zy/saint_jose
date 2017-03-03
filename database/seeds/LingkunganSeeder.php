<?php

use Illuminate\Database\Seeder;

class LingkunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_lingkungan')->truncate();

        //Isi Data Awal
        DB::table('tbl_lingkungan')->insert([
            ['nm_lingkungan'=>'St. Paulus'],
            ['nm_lingkungan'=>'St. Maria'],
            ['nm_lingkungan'=>'St. Elisabeth'],
            ['nm_lingkungan'=>'St. Theresia'],
            ['nm_lingkungan'=>'St. Antonius'],
                                            ]);
    }
}
