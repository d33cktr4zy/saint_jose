<?php

use Illuminate\Database\Seeder;
use stjo\Model\ForumKategori;

class ForumKategoriSeeder extends Seeder
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

        ForumKategori::truncate();
        //
        foreach(range(1,5) as $index){
            ForumKategori::create(
                [
                    'nm_kategori' => $faker->sentence(5),
                    'kat_desc' => $faker->sentence(10),
                ]
            );
        }
    }
}
