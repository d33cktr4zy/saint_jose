<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahForeignKeyKeTableForumTopik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_forum_topik', function (Blueprint $table) {
            //
            $table->foreign('id_forum_kategori')
                  ->references('id_kategori')
                  ->on('tbl_forum_kategori')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_forum_topik', function (Blueprint $table) {
            //
            $table->dropForeign('tbl_forum_topik_id_forum_kategori_foreign'); // Drop foreign key 'id_forum_kategori' from 'tbl_forum_topik' table

        });
    }
}
