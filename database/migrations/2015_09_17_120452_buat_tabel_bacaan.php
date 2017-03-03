<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelBacaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bacaan', function (Blueprint $table) {
            $table->mediumInteger('id_bacaan',true,true);
            $table->date('tgl_bacaan');
            $table->string('tema_bacaan',200);
            $table->text('isi_bacaan');
            $table->text('rangkuman')->nullable();
            $table->integer('tipe_bacaan')->default(1);                     //1=Bacaan, 2=Doa

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_bacaan');
    }
}
