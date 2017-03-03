<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        //hapus data
        DB::table('tbl_user')->truncate();

        DB::table('tbl_user')->insert(
            [
                [
                    'username'      => 'gaby',
                    'nama_depan'    => 'Gabriel',
                    'nama_belakang' => 'Fermy',
                    'password'      => bcrypt('12345'),
                    'email'         => 'adadeh@adaaja.com',
                    'alamat'        => 'disini aja',
                    'kota'          => 'Medan',
                    'kode_pos'      => '12345',
                    'user_level'    => 1,

                ]
            ]
        );

        foreach (range(1, 30) as $index)
        {
            \stjo\Model\User::create(
                [

                    'username'      => $faker->userName(),
                    'nama_depan'    => $faker->firstName(),
                    'nama_belakang' => $faker->lastName(),
                    'password'      => bcrypt('Aa12345'),
                    'email'         => $faker->email(),
                    'jk'            => $faker->numberBetween(1,2),
                    'tempat_lahir'  => $faker->city(),
                    'tanggal_lahir' => $faker->dateTimeBetween('-40 years', '-10 years'),
                    'alamat'        => $faker->address(),
                    'kota'          => $faker->city(),
                    'kode_pos'      => $faker->postcode(),
                    'user_level'    => 0,
                    'kunjungan_terakhir'    => $faker->dateTimeBetween('-2 weeks', 'now'),
                    'kunjungan_terakhir'    => $faker->dateTimeBetween('-2 weeks', 'now'),

                ]
            );
        }
    }
}
