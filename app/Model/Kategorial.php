<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class Kategorial extends Model
{
    //
	protected $primaryKey = 'id_kategorial';
	protected $table = 'tbl_kategorial';
	public $timestamps = false;

	protected $fillable = [
		'nm_kategorial',
		'id_ketua_kategorial'
	];
}
