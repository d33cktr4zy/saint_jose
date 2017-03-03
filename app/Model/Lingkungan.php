<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class Lingkungan extends Model
{
    //
	protected $primaryKey = 'id_lingkungan';
	protected $table = 'tbl_lingkungan';
	public $timestamps = false;

	protected $fillable = [
		'nm_lingkungan',
		'id_ketua_lingkungan',
	];

	/**
	 * Relationships
	 */
	public function umat()
	{
		return $this->hasMany('\stjo\Model\Umat','id_lingkungan','id_lingkungan');
	}

}
