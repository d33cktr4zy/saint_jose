<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class SakramenUmat extends Model
{
    //
	protected $primaryKey = 'id_sakramen_umat';
	protected $table = 'tbl_sakramen_umat';
	public $timestamps = false;

	protected $fillable = [
		'id_umat',
		'id_sakramen',
		'tgl_terima',
		'pemberi_sakramen',
		'tempat_pemberian_sakramen',
		'no_sertifikat',
	];
}
