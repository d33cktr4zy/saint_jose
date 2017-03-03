<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelKeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_keluarga', function (Blueprint $table) {
            $table->mediumInteger('id_keluarga',true,true);
            $table->mediumInteger('id_kk',false,true);                      //ID umat sebagai kepala keluarga
            $table->mediumInteger('id_lingkungan',false,true);              //ID Lingkungan tempat keluarga tinggal

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_keluarga');
    }
}
