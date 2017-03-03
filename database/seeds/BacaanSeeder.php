<?php

use Illuminate\Database\Seeder;

class BacaanSeeder extends Seeder
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
        \stjo\Model\Bacaan::truncate();
        foreach (range(1, 30) as $index)
        {
            \stjo\Model\Bacaan::create([
                               'tgl_bacaan'  => $faker->dateTimeBetween($startDate='-10 days', $endDate='now'),
                               'tema_bacaan'   => $faker->sentence(5),
                               'isi_bacaan'    => $faker->realText($nb=100),
                               'rangkuman'    => $faker->optional()->text(300),
                               'tipe_bacaan'   => $faker->numberBetween(1,2)

                           ]
            );
        }
    }
}
