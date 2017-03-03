<?php

namespace stjo\Http\Controllers;

use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Model\Berita;
use stjo\Model\Kategorial;
use stjo\Model\Sakramen;

class BeritaController extends Controller
{

    //
    public function index()
    {
        $data = Berita::all();

        return view('dataBerita', ['berita' => $data]);
    }


    public function beritaBaru()
    {
        //show the form
        $kategorial = Kategorial::all();
        $sakramen   = Sakramen::all();

        return view('form.inputBeritaForm', ['kats' => $kategorial, 'saks' => $sakramen]);
    }


    public function simpanBeritaBaru(Request $request){
        //dd($request);
        if($request->sakramen == ""){$request->sakramen = null;}
        if($request->kategorial == ""){$request->kategorial = null;}
        if(Berita::create(
            [
                'waktu_berita'  => \Carbon\Carbon::parse($request->waktu),
                'id_pengirim'   => $request->id_sender,
                'jdl_berita'    => $request->judul,
                'isi_berita'    => $request->isi,
                'id_sakramen'   => $request->sakramen,
                'id_kategorial' => $request->kategorial
            ]
        )){
            return redirect()->route('lihatBeritaAdmin')->withErrors(['errors' => 'Berita Baru Berhasil disimpan...']);
        }
        return redirect()->route('lihatBeritaAdmin')->withErrors(['errors' => 'Gagal menyimpan Berita Baru!']);
    }


    public function listBeritaAdmin(Request $request)
    {
        //dd($request, \Input::all());
        //data for options
        $kats = Kategorial::all();
        $saks = Sakramen::all();


        //safety measures
        if($request->kategorial == ""){$request->kategorial = null;};
        if($request->sakramen == ""){$request->sakramen = null;};

        if($request->data_range == "filter") {
            //mau di filter
            if(($request->fil1 == "kategorial") && ($request->fil2 == "sakramen")) {
                $data =
                    Berita::where('id_kategorial', $request->kategorial)
                          ->where('id_sakramen', '=', $request->sakramen)
                          ->paginate(5)
                ;

                $data->appends(['data_range' => 'filter', 'fil1' => 'kategorial', 'kategorial' => $request->kategorial, 'fil2' => 'sakramen', 'sakramen' => $request->sakramen]);

            }
            elseif(($request->fil1 == "kategorial")) {
                $data =
                    Berita::where('id_kategorial', $request->kategorial)
                          ->paginate(5)
                ;

                $data->appends(['data_range' => 'filter', 'fil1' => 'kategorial', 'kategorial' => $request->kategorial]);

            }
            elseif(($request->fil2 == "sakramen")) {
                $data =
                    Berita::where('id_sakramen', $request->sakramen)
                          ->paginate(5)
                ;
                $data->appends(['data_range' => 'filter', 'fil2' => 'sakramen', 'sakramen' => $request->sakramen]);

            }
            else {

                //mau difilter tapi ga ada yang di centang...
                return redirect()
                    ->back()
                    ->withErrors(['errors' => 'Anda belum memilih filter data.'])
                    ;
            }
        }
        else {
            //ga mau di filter
            $data =
                Berita::orderBy('waktu_berita')
                      ->paginate(5)
            ;
        }

        return view('data.listBeritaAdmin', ['data' => $data, 'kats' => $kats, 'saks' => $saks]);
    }

    public function editBerita($id){
        //show form
        $data = Berita::findOrFail($id);

        $kategorial = Kategorial::all();
        $sakramen   = Sakramen::all();

        return view('form.inputBeritaForm', ['kats' => $kategorial, 'saks' => $sakramen, 'data' => $data, 'edit' => true]);

    }

    public function updateBerita(Request $request, $id){
        //save edits
        //dd($request, $id);
        if($request->sakramen == ""){$request->sakramen = null;}
        if($request->kategorial == ""){$request->kategorial = null;}

        $korban = Berita::findOrFail($id);
        $korban->waktu_berita   = \Carbon\Carbon::parse($request->waktu);
        $korban->id_pengirim    = $request->id_sender;
        $korban->jdl_berita     = $request->judul;
        $korban->isi_berita     = $request->isi;
        $korban->id_sakramen    = $request->sakramen;
        $korban->id_kategorial  = $request->kategorial;
        if($korban->save()){
            return redirect()->route('lihatBeritaAdmin')->withErrors(['errors' => 'Berita Berhasil diupdate...']);
        }
        return redirect()->route('lihatBeritaAdmin')->withErrors(['errors' => 'Gagal mengupdate!']);
    }

    public function deleteBerita($id){
        $korban = Berita::findOrFail($id);

        if($korban->delete()){
        return redirect()->back()->withErrors(['errors' => 'Berita Berhasil Di HAPUS!']);
        }
        return redirect()->back()->withErrors(['errors' => 'Penghapusan Berita .... GAGAL!']);

    }
}
