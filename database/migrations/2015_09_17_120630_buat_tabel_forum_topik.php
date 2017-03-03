<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelForumTopik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_forum_topik', function (Blueprint $table) {
            $table->mediumInteger('id_topik', true, true);
            $table->string('nm_topik');
            $table->mediumInteger('id_forum_kategori', false, true);
            $table->dateTime('waktu_buat_topik');
            $table->mediumInteger('id_pembuat', false, true);
            $table->string('desc_topic')
                  ->nullable()
            ;
            $table->mediumInteger('id_post_last', false, true)
                  ->nullable()
            ;
            $table->mediumInteger('id_poster_last', false, true)
                  ->nullable()
            ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_forum_topik');
    }
}
