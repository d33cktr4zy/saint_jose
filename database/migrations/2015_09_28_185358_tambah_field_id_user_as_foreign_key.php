<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahFieldIdUserAsForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_umat', function (Blueprint $table) {
            $table->mediumInteger('id_user',false,true)->nullable()->unique();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_umat', function (Blueprint $table) {
            $table->dropColumn('id_user');
        });
    }
}
