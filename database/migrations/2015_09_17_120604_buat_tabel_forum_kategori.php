<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelForumKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_forum_kategori', function (Blueprint $table) {
            $table->mediumInteger('id_kategori',true,true);
            $table->string('nm_kategori');
            $table->mediumText('kat_desc')->nullable();
            $table->mediumInteger('id_last_post',false,true)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_forum_kategori');
    }
}
