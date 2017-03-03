<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class Sakramen extends Model
{
    //
	protected $primaryKey = 'id_sakramen';
	protected $table = 'tbl_sakramen';
	public $timestamps = false;

	protected $fillable = [
		'nm_sakramen'
	];
}
