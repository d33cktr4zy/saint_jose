<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kegiatan', function (Blueprint $table) {
            $table->mediumInteger('id_kegiatan',true,true);
            $table->string('nm_kegiatan');
            $table->mediumInteger('id_kategorial',false,true)->nullable();
            $table->string('jns_kegiatan')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->longText('detail_kegiatan');
            $table->dateTime('waktu_input');                                //waktu kegitan diinput
            $table->string('lokasi')->nullable();
            $table->string('kontak')->nullable();                           //kontak person
            $table->mediumInteger('id_sakramen',false,true)->nullable();                //id Sakramen jika berhubungan dengan kegiatan sakramen

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_kegiatan');
    }
}
