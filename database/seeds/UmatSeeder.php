<?php

use Illuminate\Database\Seeder;
use stjo\Model\Umat;

class UmatSeeder extends Seeder
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

        Umat::truncate();
        foreach (range(1, 200) as $index)
        {
            Umat::create([
                                   'nama_depan' => $faker->firstName(),
                                   'nama_belakang' => $faker->lastName(),
                                   'jk' => $faker->numberBetween(1,2),
                                   'tempat_lahir' => $faker->city(),
                                   'tanggal_lahir' => $faker->dateTimeBetween('-30 years','-10 years'),
                                   'alamat' => $faker->address(),
                                   'no_telp' => $faker->phoneNumber(),
                                   'id_keluarga' => $faker->numberBetween(1,50),
                                   'id_lingkungan' => $faker->numberBetween(1,5),
                               ]);
        }


    }
}
