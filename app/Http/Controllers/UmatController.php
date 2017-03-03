<?php

namespace stjo\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Model\Keluarga;
use stjo\Model\Lingkungan;
use stjo\Model\Umat;

class UmatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request);
        //data supplier
        $ling = Lingkungan::all();

        $umurMuda = 10;
        $umurTua = 70;

        //sanity check umur
        if($request->has('muda') || $request->has('tua'))
        {
            if($request->muda > $request->tua){
                $umurMuda = $request->tua;
                $umurTua = $request->muda;
            }else{
                $umurMuda = $request->muda;
                $umurTua = $request->tua;
            }
        }
        if($request->dataRange == "filtered"){
            //mau di filter
            if($request->has('lingCheck') && $request->has('jkCheck') && $request->has('umur')){
                //semua di centang
                $umat = Umat::where('id_lingkungan', $request->lingOption)
                    ->where('jk', $request->jkOption)
                    ->whereBetween('tanggal_lahir',[Carbon::now()->subYears($umurTua),Carbon::now()->subYears($umurMuda)])
                    ->paginate(10);

                $umat->appends(
                    [
                        'dataRange' => $request->dataRange,
                        'lingCheck' => $request->lingCheck,
                        'lingOption'=> $request->lingOption,
                        'jkCheck' => $request->jkCheck,
                        'jkOption' => $request->jkOption,
                        'umur' => $request->umur,
                        'muda'=> $request->muda,
                        'tua' => $request->tua
                    ]
                );
                return view('data.dataUmatAdmin',['lingkungan' =>$ling, 'umats' => $umat, 'uMuda' => $umurMuda, 'uTua' => $umurTua]);
            }
            elseif($request->has('lingCheck') && $request->has('jkCheck') && !$request->has('umur')){
                //lingkungan & jk
                $umat = Umat::where('id_lingkungan', $request->lingOption)
                            ->where('jk', $request->jkOption)
                            ->paginate(10);

                $umat->appends(
                    [
                        'dataRange' => $request->dataRange,
                        'lingCheck' => $request->lingCheck,
                        'lingOption'=> $request->lingOption,
                        'jkCheck' => $request->jkCheck,
                        'jkOption' => $request->jkOption,
                    ]
                );
                return view('data.dataUmatAdmin',['lingkungan' =>$ling, 'umats' => $umat, 'uMuda' => $umurMuda, 'uTua' => $umurTua]);
            }
            elseif($request->has('lingCheck') && !$request->has('jkCheck') && $request->has('umur')){
                //lingkungan & umur
                $umat = Umat::where('id_lingkungan', $request->lingOption)
                            ->whereBetween('tanggal_lahir',[Carbon::now()->subYears($umurTua),Carbon::now()->subYears($umurMuda)])
                            ->paginate(10);

                $umat->appends(
                    [
                        'dataRange' => $request->dataRange,
                        'lingCheck' => $request->lingCheck,
                        'lingOption'=> $request->lingOption,
                        'umur' => $request->umur,
                        'muda'=> $request->muda,
                        'tua' => $request->tua
                    ]
                );
                return view('data.dataUmatAdmin',['lingkungan' =>$ling, 'umats' => $umat, 'uMuda' => $umurMuda, 'uTua' => $umurTua]);
            }
            elseif($request->has('lingCheck') && !$request->has('jkCheck') && !$request->has('umur')){
                //lingkungan
                $umat = Umat::where('id_lingkungan', $request->lingOption)
                            ->paginate(10);

                $umat->appends(
                    [
                        'dataRange' => $request->dataRange,
                        'lingCheck' => $request->lingCheck,
                        'lingOption'=> $request->lingOption,
                    ]
                );
                return view('data.dataUmatAdmin',['lingkungan' =>$ling, 'umats' => $umat, 'uMuda' => $umurMuda, 'uTua' => $umurTua]);
            }
            elseif(!$request->has('lingCheck') && $request->has('jkCheck') && $request->has('umur')){
                //jk & umur
                $umat = Umat::where('jk', $request->jkOption)
                            ->whereBetween('tanggal_lahir',[Carbon::now()->subYears($umurTua),Carbon::now()->subYears($umurMuda)])
                            ->paginate(10);

                $umat->appends(
                    [
                        'dataRange' => $request->dataRange,
                        'jkCheck' => $request->jkCheck,
                        'jkOption' => $request->jkOption,
                        'umur' => $request->umur,
                        'muda'=> $request->muda,
                        'tua' => $request->tua
                    ]
                );
                return view('data.dataUmatAdmin',['lingkungan' =>$ling, 'umats' => $umat, 'uMuda' => $umurMuda, 'uTua' => $umurTua]);
            }
            elseif(!$request->has('lingCheck') && $request->has('jkCheck') && !$request->has('umur')){
                //jk
                $umat = Umat::where('jk', $request->jkOption)
                            ->paginate(10);

                $umat->appends(
                    [
                        'dataRange' => $request->dataRange,
                        'jkCheck' => $request->jkCheck,
                        'jkOption' => $request->jkOption,
                    ]
                );
                return view('data.dataUmatAdmin',['lingkungan' =>$ling, 'umats' => $umat, 'uMuda' => $umurMuda, 'uTua' => $umurTua]);
            }
            elseif(!$request->has('lingCheck') && !$request->has('jkCheck') && $request->has('umur')){
                //umur
                $umat = Umat::whereBetween('tanggal_lahir',[Carbon::now()->subYears($umurTua),Carbon::now()->subYears($umurMuda)])
                            ->paginate(10);

                $umat->appends(
                    [
                        'dataRange' => $request->dataRange,
                        'umur' => $request->umur,
                        'muda'=> $request->muda,
                        'tua' => $request->tua
                    ]
                );
                return view('data.dataUmatAdmin',['lingkungan' =>$ling, 'umats' => $umat, 'uMuda' => $umurMuda, 'uTua' => $umurTua]);
            }
            elseif(!$request->has('lingCheck') && !$request->has('jkCheck') && !$request->has('umur')){
                //none
                return redirect()->back()->withErrors(['errors' => 'Anda Belum Memilih data untuk di Filter...!!!']);
            }
        }
        else
        {
            //ga mau di filter
            $umat = Umat::paginate(10);
            $umat->appends([]);
            return view('data.dataUmatAdmin',['lingkungan' =>$ling, 'umats' => $umat, 'uMuda' => $umurMuda, 'uTua' => $umurTua]);
        }

    }

    public function updateKeluargaAjax(){
        //check sesison token xsrf
        if (\Session::token() !== \Input::get('_token')){
            return Response::json(array('msg' => 'Unathorized'));
        }

        $data = \Input::get('idLing');
        $kk = Keluarga::where('id_lingkungan',$data)->get();

        return \Response::json($kk);

    }

    /**
     * Tampilkan form buat umat
     *
     * @return \Illuminate\Http\Response
     */
    public function baru(){
        //data supply
        $ling = Lingkungan::all();
        $kel = Keluarga::all();
        return view('form.editUmatForm',['lingkungan'=>$ling, 'keluarga' => $kel]);
    }


    /**
     * Simpan Umat yang dibuat admin
     * @param \Illuminate\Http\Request $request
     */
    public function simpanBaru(Request $request)
    {

    }


    /**
     * Hapus Umat
     * @param $id
     */
    public function deleteUmat($id)
    {

    }


    /**
     * tampilkan form edit umat
     * @param $id
     */
    public function editUmat($id){
        $kel = Keluarga::all();
        $ling = Lingkungan::all();
        $data = Umat::findOrFail($id);
        return view('form.editUmatForm',['data' => $data, 'edit' => true, 'lingkungan' => $ling, 'keluarga' => $kel]);
    }


    /**
     * Simpan Perubahan data Umat
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     */
    public function updateUmat(Request $request, $id)
    {

    }
}
