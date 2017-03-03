<?php

namespace stjo\Http\Repositories;

use stjo\Model\Kategorial;
use stjo\Model\Sakramen;

class NavbarRepository {

    public function getNamaSakramen(){
        $sakramen = Sakramen::all();

        return $sakramen;
    }

    public function getNamaKategorial(){
        $kategorial = Kategorial::all();

        return $kategorial;
    }


}