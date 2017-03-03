<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahForeignKeyKeTableForumPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_forum_post', function (Blueprint $table) {
            //
                $table->foreign('id_forum_topik')
                      ->references('id_topik')
                      ->on('tbl_forum_topik')
                      ->onDelete('cascade')
                ;

                $table->foreign('id_forum_kategori')
                      ->references('id_kategori')
                      ->on('tbl_forum_kategori')
                      ->onDelete('cascade')
                ;

                $table->foreign('id_user')
                      ->references('id')
                      ->on('tbl_user')
                      ->onDelete('cascade')
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
        Schema::table('tbl_forum_post', function (Blueprint $table) {
            //
            $table->dropForeign('tbl_forum_post_id_forum_topik_foreign'); // Drop foreign key 'id_forum_topik' from 'tbl_forum_post' table
            $table->dropForeign('tbl_forum_post_id_forum_kategori_foreign'); // Drop foreign key 'id_forum_kategori' from 'tbl_forum_post' table
            $table->dropForeign('tbl_forum_post_id_user_foreign');
        });
    }
}
