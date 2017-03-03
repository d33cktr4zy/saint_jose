<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    //
	protected $primaryKey = 'id_pengurus';
	protected $table = 'tbl_pengurus';
	public $timestamps = false;

	protected $fillable = [
		'jabatan',
		'id_umat',
	];
}
