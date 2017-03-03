<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class JenisPengumuman extends Model
{

    //
    protected $primaryKey = 'id_jns_pengumuman';

    protected $table = 'tbl_jenis_pengumuman';

    public $timestamps = false;

    protected $fillable = [
        'jns_pengumuman', 'keterangan'
    ];


    //Relation

    public function pengumuman()
    {
        return $this->hasMany('\stjo\Model\Pengumuman','id_jns_pengumuman', 'id_jns_pengumuman');
    }

}