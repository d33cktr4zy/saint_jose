<?php

namespace stjo\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{

    use Authenticatable, Authorizable, CanResetPassword;

    //
    protected $primaryKey = 'id';

    protected $table = 'tbl_user';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'email',
        'alamat',
        'jk',
        'nama_depan',
        'nama_belakang',
        'tempat_lahir',
        'tanggal_lahir',
        'kota',
        'kode_pos',
        'user_level',
        'kunjungan_terakhir',
        'jumlah_post',
        'id_umat',
        'path_gambar',
    ];


    //Authentication
 /*   public function getRememberToken()
    {
        return $this->remember_token;
    }


    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }


    public function getRememberTokenName()
    {
        return 'remember_token';
    }


    public function getAuthIdentifier()
    {
        return $this->username;
    }


    public function getAuthPassword()
    {
        return $this->password;
    }*/


    //Relationship
    //user bisa saja umat bisa saja tidak

    //user memiliki banyak forum post
    public function forumPost()
    {
        return $this->hasMany('stjo\Model\ForumPost', 'id_user', 'id');
    }

    public function forumTopik()
    {
        return $this->hasMany('\stjo\Model\ForumTopik', 'id_pembuat','id');
    }

    public function isUmat ()
    {
        return $this->hasOne('\stjo\Model\Umat', 'id_user', 'id_user');
    }
}
