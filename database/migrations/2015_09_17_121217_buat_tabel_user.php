<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->mediumInteger('id',true,true);
            $table->string('username',20)->unique();
            $table->string('nama_depan', 30);
            $table->string('nama_belakang', 30);
            $table->string('password',60);                                  //md5 hash for password storage
            $table->string('email');
            $table->tinyInteger('jk',false,true);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('kota');
            $table->string('kode_pos',5);
            $table->boolean('user_level');                                  //user level | 0=biasa, 1=Admin/Pengurus
            $table->dateTime('kunjungan_terakhir')->nullable();
            $table->mediumInteger('jumlah_post',false,true)->nullable();
            $table->mediumInteger('id_umat',false,true)->nullable();
            $table->text('path_gambar')->nullable();
            $table->string('remember_token',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_user');
    }
}
