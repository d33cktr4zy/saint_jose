<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class Bacaan extends Model
{
    //
	protected $primaryKey = 'id_bacaan';
	protected $table = 'tbl_bacaan';
	public $timestamps = false;

	protected $fillable = [
		'tgl_bacaan',
		'tema_bacaan',
		'isi_bacaan',
		'rangkuman',
		'tipe_bacaan',
	];
}
