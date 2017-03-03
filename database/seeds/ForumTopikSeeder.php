<?php

use Illuminate\Database\Seeder;
use stjo\Model\ForumTopik;

class ForumTopikSeeder extends Seeder
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
        ForumTopik::truncate();
        foreach (range(1, 30) as $index)
        {
            \stjo\Model\ForumTopik::create(
                [
                    'nm_topik'          => $faker->sentence(3),
                    'id_forum_kategori' => $faker->numberBetween(1, 5),
                    'waktu_buat_topik'  => $faker->dateTimeBetween('-10 days', 'yesterday'),
                    'id_pembuat'        => $faker->numberBetween(1, 30),
                    'desc_topic'        => $faker->text(200),
                    'id_post_last'      => $faker->unique()->numberBetween(1, 200),
                    'id_poster_last'    => $faker->numberBetween(1, 30),
                ]
            );
        }
    }
}


