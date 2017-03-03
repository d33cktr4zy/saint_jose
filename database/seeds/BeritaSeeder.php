<?php

use Illuminate\Database\Seeder;
use stjo\Model\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
		Berita::truncate();
	    foreach (range(1, 30) as $index)
	    {
		    Berita::create([
			                   'waktu_berita'  => $faker->dateTimeBetween($startDate='-10 days', $endDate='+10 days'),
			                   'id_pengirim'   => $faker->numberBetween(1,5),
			                   'jdl_berita'    => $faker->sentence($nbWords=4),
			                   'isi_berita'    => $faker->text(1000),
			                   'id_sakramen'   => $faker->optional()->numberBetween(1,3),
			                   'id_kategorial' => $faker->optional()->numberBetween(1,7)
		                   ]
		    );
	    }
    }
}
