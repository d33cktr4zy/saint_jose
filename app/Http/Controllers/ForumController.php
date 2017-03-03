<?php

namespace stjo\Http\Controllers;

use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Model\ForumKategori;
use stjo\Model\ForumTopik;

class ForumController extends Controller
{
    public function topikIndex($topikID)
    {
        $topik = ForumTopik::all();
        return view('forum.topikIndex', ['topik' => $topik]);
    }


    public function manageKategori(){
        $kat = ForumKategori::simplePaginate(5);


        return view('form.manajemenKategori',['fKat' => $kat]);
    }

    public function buatKategori(Request $request){
        //dd($request);
        if($newKat = ForumKategori::create(
            [
                'nm_kategori'   => $request->namaKategori,
                'kat_desc'      => $request->desc
            ]
        ))
        {
            return redirect()->route('manKategori')->withErrors(['errors'=> 'Berhasil Membuat Kategori Forum Baru!']);
        }
        return redirect()->route('manKategori')->withErrors(['errors'=> 'Gagal membuat Kategori Forum Baru!']);

    }

    public function editKategori($id){
        $fKatEdit = ForumKategori::findOrFail($id);


        $kat = ForumKategori::simplePaginate(5);
        return view('form.manajemenKategori', ['fKat' => $kat, 'edit'=> true, 'fKatEdit'=>$fKatEdit]);
    }

    public function updateKategori(Request $request, $id){
        $kat = ForumKategori::findOrFail($id);
        //dd($request, $id, $kat);
        if($request->namaKategori != $kat->nm_kategori){$kat->nm_kategori = $request->namaKategori;};
        if($request->desc != $kat->kat_desc){$kat->kat_desc = $request->desc;};
        if($kat->save()){
            return redirect()->route('manKategori')->withErrors(['errors'=> 'Kategori Forum Berhasil di Update']);
        }

        return redirect()->back([302]);
    }

    public function deleteKategori($id){
        $katToBeDeleted = ForumKategori::findOrFail($id);
        if($katToBeDeleted->delete()){
            return redirect()->route('manKategori')->withErrors(['errors'=> 'Kategori Forum Berhasil di Hapus']);
        }

        return redirect()->route('manKategori')->withErrors(['errors'=> 'Terjadi Kesalahan dalam peghapusan Forum Kategori']);


    }

    public function manageTopik(Request $request){
        if(isset($request->fKat)){

        }
        $kat = ForumKategori::all();
        $topik = ForumTopik::simplePaginate(5);
        return view('form.manajemenTopik',['topik' => $topik, 'fkat' => $kat]);
    }

    /**
     * Main Forum View
     * ______________________________________
     * @return \Illuminate\View\View
     *
     */
    public function index(){
        $kat = ForumKategori::all();
        return view('forum.front',['kate' => $kat]);
    }
}

