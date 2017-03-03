<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelJenisPengumuman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_jenis_pengumuman', function (Blueprint $table) {
            $table->mediumInteger('id_jns_pengumuman',true,true);
            $table->string('jns_pengumuman');
            $table->string('keterangan')->nullable(); //keterangan mengenai jenis pengumuman

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_jenis_pengumuman');
    }
}
