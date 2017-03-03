<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPengurus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pengurus', function (Blueprint $table) {
            $table->mediumInteger('id_pengurus',true,true);
            $table->string('jabatan');
            $table->mediumInteger('id_umat',false,true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_pengurus');
    }
}
