<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelUmat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_umat', function (Blueprint $table) {
            $table->mediumInteger('id_umat',true,true);
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->tinyInteger('jk',false,true);                       //Jenis Kelamin | 1=Pria, 2=Wanita
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('no_telp')->nullable();
            $table->mediumInteger('id_keluarga',false,true)->nullable();
            $table->mediumInteger('id_lingkungan',false,true)->nullable();
            $table->text('path_gambar')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_umat');
    }
}
