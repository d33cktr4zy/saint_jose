<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    //
	protected $primaryKey = 'id_post';
	protected $table = 'tbl_forum_post';
	public $timestamps = false;

	protected $fillable = [
		'wkt_kirim',
		'id_user',
		'id_forum_kategori',
		'id_forum_topik',
		'jdl_post',
		'isi_post',
		'waktu_review',
		'id_reviewer',
	];

	//Relationship
	//satu post hanya bisa ada dalam 1 kategori
	//satu post hanya memiliki satu user id (id pengirimnya)
	//

	public function kategori()
	{
		return $this->belongsTo('\stjo\Model\ForumKategori','id_kategori','id_forum_kategori');
	}

	public function topik()
	{
		return $this->belongsTo('stjo\Model\ForumTopik','id_forum_topik', 'id_topik');
	}

	public function user()
	{
		return $this->belongsTo('\stjo\Model\User','id_user','id');
	}
}
