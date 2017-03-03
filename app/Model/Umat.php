<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class Umat extends Model
{
    //
	protected $primaryKey = 'id_umat';
	protected $table = 'tbl_umat';
	public $timestamps = false;

	protected $fillable = [
		'nama_depan',
		'nama_belakang',
		'jk',
		'tempat_lahir',
		'tanggal_lahir',
		'alamat',
		'no_telp',
		'id_keluarga',
		'id_lingkungan',
		'path_gambar',
		'id_user',
	];

	//Relationship
	//Umat bisa saja user bisa saja tidak
	//Satu umat bisa memiliki banyak sakramen
	public function SakramenUmat(){
		return $this->hasMany('\stjo\Model\SakramenUmat');
	}

	public function lingkungan(){
		return $this->belongsTo('\stjo\Model\Lingkungan', 'id_lingkungan', 'id_lingkungan');
	}

	public function keluarga(){
		return $this->belongsTo('\stjo\Model\Keluarga','id_keluarga','id_keluarga');
	}

	public function isUser(){
		return $this->hasOne('\stjo\Model\User', 'id_umat', 'id_umat');
	}

}

