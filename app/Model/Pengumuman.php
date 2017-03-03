<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    //
	protected $primaryKey = 'id_pengumuman';
	protected $table = 'tbl_pengumuman';
	public $timestamps = false;

	protected $fillable = [
		'tgl_pengumuman',
		'id_jns_pengumuman',
		'tema_pengumuman',
		'isi_pengumuman'
	];
}
