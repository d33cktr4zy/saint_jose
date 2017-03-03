<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    //
	protected $primaryKey = 'id_kegiatan';
	protected $table = 'tbl_kegiatan';
	public $timestamps = false;

	protected $fillable = [
		'nm_kegiatan',
		'id_kategorial',
		'jns_kegiatan',
		'tgl_mulai',
		'tgl_selesai',
		'detail_kegiatan',
		'waktu_input',
		'lokasi',
		'kontak',
		'id_sakramen',
	];
}
