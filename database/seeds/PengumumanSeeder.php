<?php

use Illuminate\Database\Seeder;
use stjo\Model\Pengumuman;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

	    Pengumuman::truncate();
	    foreach (range(1, 30) as $index)
	    {
		    Pengumuman::create([
			    'tgl_pengumuman' => $faker->dateTimeBetween('-1 month','+2 months'),
			    'id_jns_pengumuman' => $faker->optional()->numberBetween($min=1,$max=5),
			    'tema_pengumuman' => $faker->sentence(5,true),
			    'isi_pengumuman' => $faker->paragraphs(3,true)
		                       ]);
	    }

	    //
    }
}
