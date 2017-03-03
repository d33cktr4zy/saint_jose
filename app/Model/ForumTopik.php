<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class ForumTopik extends Model
{
    //
	protected $primaryKey = 'id_topik';
	protected $table = 'tbl_forum_topik';
	public $timestamps = false;

	protected $fillable = [
		'nm_topik',
		'id_forum_kategori',
		'waktu_buat_topik',
		'id_pembuat',
		'desc_topic',
		'id_post_last',
		'id_poster_last',
	];



	//relationship

	//1 topik bisa memiliki banyak post
	public function kategori ()
	{
		return $this->belongsTo('\stjo\Model\ForumKategori', 'id_kategori');
	}

	public function posts()
	{
		return $this->hasMany('stjo\Model\ForumPost','id_forum_topik','id_topik');

	}
}
