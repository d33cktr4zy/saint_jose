<?php

namespace stjo\Http\Controllers;

use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;

class SakramenController extends Controller
{
    //
    public function index($sakramen) {
        //ubah string menjadi format 'xxx_yyy' supaya dapat delimeternya
        $id = snake_case($sakramen);

        //ubah $id menjadi target filenya
        $aksi = explode('_',$id);
        return view('sakramen.'. $aksi[1]);
    }
}
