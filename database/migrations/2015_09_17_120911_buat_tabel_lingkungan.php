<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelLingkungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lingkungan', function (Blueprint $table) {
            $table->mediumInteger('id_lingkungan',true,true);
            $table->string('nm_lingkungan');
            $table->mediumInteger('id_ketua_lingkungan',false,true)->nullable();                //ID Umat sebagai Ketua lingkungan

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_lingkungan');
    }
}
