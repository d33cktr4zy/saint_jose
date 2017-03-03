<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //disable FK Check

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        echo 'FK Checks Disabled!';
        echo "\n";
        // $this->call(UserTableSeeder::class);
        $this->call('BacaanSeeder');
        $this->call('BeritaSeeder');
        $this->call('ForumKategoriSeeder');
        $this->call('ForumPostSeeder');
        $this->call('ForumTopikSeeder');
        $this->call('KategorialSeeder');
        $this->call('KeluargaSeeder');
        $this->call('LingkunganSeeder');
        $this->call('PengumumanSeeder');
        $this->call('SakramenSeeder');
        $this->call('UmatSeeder');
        $this->call('UserSeeder');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        echo 'FK Check Re-enabled!' . "\n";
        Model::reguard();
    }
}
