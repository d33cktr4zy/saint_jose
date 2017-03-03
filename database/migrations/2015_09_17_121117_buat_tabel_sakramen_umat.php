<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelSakramenUmat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sakramen_umat', function (Blueprint $table) {
            $table->mediumInteger('id_sakramen_umat',true,true);
            $table->mediumInteger('id_umat',false,true);
            $table->mediumInteger('id_sakramen',false,true);
            $table->date('tgl_terima');                                     //tanggal terima Sakramen
            $table->string('pemberi_sakramen')->nullable();
            $table->string('tempat_pemberian_sakramen')->nullable();
            $table->string('no_sertifikat')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_sakramen_umat');
    }
}
