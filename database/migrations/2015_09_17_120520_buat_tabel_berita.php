<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_berita', function (Blueprint $table) {
            $table->mediumInteger('id_berita',true,true);
            $table->timestamp('waktu_berita');
            $table->mediumInteger('id_pengirim',false,true);
            $table->string('jdl_berita');
            $table->longText('isi_berita');
            $table->mediumInteger('id_sakramen',false,true)->nullable();
            $table->mediumInteger('id_kategorial',false,true)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_berita');
    }
}
