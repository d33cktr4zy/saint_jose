<?php

namespace stjo\Http\Controllers;

use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Model\JenisPengumuman;
use stjo\Model\Pengumuman;

class PengumumanController extends Controller
{
    //
    public function baru(){
        $jPeng = JenisPengumuman::all();
        return view('form.inputPengumumanForm', ['jenis' => $jPeng]);
    }

    public function simpan(Request $request){
        if($request->edit){
            //dd($request, $request->id);
            $diEdit = Pengumuman::findOrFail($request->id);

            $diEdit->tgl_pengumuman =  \Carbon\Carbon::parse($request->tanggal)->toDateString();
            $diEdit->tema_pengumuman = $request->judul;
            $diEdit->isi_pengumuman = $request->isi;
            $diEdit->id_jns_pengumuman = $request->jenis;
            if($diEdit->save()){
                return redirect()
                    ->route('lihatPengumumanAdmin')
                    ->withErrors(['errors' => 'Pengumuman Berhasil di update']);
            };
        }
//dd($request);
        if(Pengumuman::create(
            [
                'tgl_pengumuman' => \Carbon\Carbon::parse($request->tanggal)->toDateString(),
                'tema_pengumuman' => $request->judul,
                'isi_pengumuman' => $request->isi,
                'id_jns_pengumuman' => $request->jenis,
            ]
        )){
            return redirect()->route('lihatPengumumanAdmin')->withErrors(['errors' => 'Pengumuman Baru berhasil disimpan....']);
        }

        return redirect()->back()->withInput()->withErrors(['errors' => 'Gagal Menyimpan Pengumuman!']);
    }

    public function listPengumumanAdmin(Request $request){
        $jns = JenisPengumuman::all();
        if(null != $request->jenis){
            $peng = Pengumuman::where('id_jns_pengumuman','=', $request->jenis)->orderBy('tgl_pengumuman','desc')->paginate(5);
            $peng->appends(['jenis' => $request->jenis]);
        }
        else{
            $peng = Pengumuman::orderBy('tgl_pengumuman', 'desc')->orderBy('id_jns_pengumuman')->paginate(5);
        }

        return view('data.dataPengumumanAdmin',['data' => $peng, 'jns' => $jns]);
    }

    public function edit($id){
        $jPeng = JenisPengumuman::all();

        $data = Pengumuman::findOrFail($id);

        return view('form.editPengumuman', ['jenis' => $jPeng, 'data' => $data, 'edit' => true]);
    }

    public function delete($id){
        $toDel = Pengumuman::findOrFail($id);
        if($toDel->delete()){
            //penghapusan sukses
            return redirect()->route('lihatPengumumanAdmin')->withErrors(['errors'=> 'Data Berhasil di hapus!']);
        }
        return redirect()->back()->withErrors(['errors' => 'Gagal Menghapus Data Pengumuman!']);
    }

    public function listJenis(){
        $data = JenisPengumuman::paginate(5);

        return view('data.JenisPengumuman',['data' => $data]);
    }

    public function editJenisPengumuman($id){
        //show the data to be edited to the form
        //dd($id);
        $toBeEdited = JenisPengumuman::findOrFail($id);
        $data = JenisPengumuman::paginate(5);
        return view('data.JenisPengumuman', ['jPengEdit' => $toBeEdited, 'edit'=> true, 'data'=>$data]);

    }

    public function deleteJenisPengumuman($id){
        $toBeDeleted = JenisPengumuman::findOrFail($id);
        if($toBeDeleted->delete()){
            return redirect()->route('lihatJenisPengumuman')->withErrors(['errors'=>'Jenis Pengumuman Berhasil Di Hapus!']);
        }
        return redirect()->route('lihatJenisPengumuman')->withErrors(['errors'=>'Terjadi Kesalahan pada Penghapusan!']);

    }

    public function simpanJenisPengumuman(Request $request){
        //save the request
        //dd($request);
        if($request->edit){
            $toEdit = JenisPengumuman::findOrFail($request->id);
            $toEdit->jns_pengumuman = $request->jns_pengumuman;
            $toEdit->keterangan = $request->keterangan;
            if($toEdit->save()){
                return redirect()->route('lihatJenisPengumuman')->withErrors(['errors'=>'Jenis Pengumuman Berhasil Di Update!']);
            }

            return redirect()->back()->withInput()->withErrors(['errors' => 'Terjadi Kesalahan dalam Mengupdate. Silahkan Ulangi kembali...']);
        }

        //Jenis Pengumuman Baru
        //dd($request);
        if(JenisPengumuman::create(
            [
                'jns_pengumuman' => $request->jns_pengumuman,
                'keterangan' => $request->keterangan,

            ]
        ))
        {
            return redirect()->route('lihatJenisPengumuman')->withErrors(['errors' => 'Jenis Pengumuman Berhasil dibuat!']);
        }
        return view('');
    }
}
