<?php

namespace stjo\Http\Controllers;

use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Model\Umat;
use stjo\Model\User;

class UserController extends Controller
{
    //
    public function index(){
        /**
         * method ini hanya boleh di akses oleh admin
         *
         */
        if(\Auth::user()->user_level != 1){
            // its not an admin
            return redirect()->route('home')->withErrors('errors', 'Anda tidak mempunyai Akses');
        }
        if(\Input::has('cari'))
        {
            //cari username
            if(!\Input::has('username')){
                //no username given
                return redirect()
                    ->route('listUser')
                    ->withErrors(['username' => 'Anda Belum Memasukkan Username!'])
                    ;
            }
            $username = \Input::get('username');

            $user = User::where('username','LIKE', '%'.$username. '%')
                        ->orderBy('username')
                        ->paginate(10);

            return view('data.dataUserAdmin', ['users' => $user, 'username'=>$username]);

        }
        $users = User::orderBy('username')->paginate(10);

        return view('data.dataUserAdmin',['users' => $users]);
    }

    public function show(){
        /**
         *  method ini dipakai user biasa dan admin untuk menampilkan profile nya
         *
         */

        return view('data.profileUser');
    }

    public function editUser($id){
        $user = User::find($id);

        return view('form.editUserForm',['user'=>$user]);
    }

    public function updateUser($id, Request $request){

        if(isset($request->sendiri)){
            if($request->id <> \Auth::user()->id){
                //ini request buat edit sendiri tapi mau ngubah id orang. Ga boleh ya!
                Return redirect()->back()->withErrors(['errors' => 'Anda Tidak bisa Melakukan ini.']);
            }
        }
        $user = User::findOrFail($id);
//        dd($id, $request, $user);

        if($request->namaDepan      <> $user->nama_depan){$user->nama_depan = $request->namaDepan;}
        if($request->namaBelakang   <> $user->nama_belakang){$user->nama_belakang = $request->namaBelakang;}
        if($request->email   <> $user->email){$user->email = $request->email;}
        if($request->jk   <> $user->jk){$user->jk = $request->jk;}
        if($request->tempatLahir   <> $user->tempat_lahir){$user->tempat_lahir = $request->tempatLahir;}
        if(\Carbon\Carbon::parse($request->tglLahir)->format('Y-m-d')   <> $user->tanggal_lahir){$user->tanggal_lahir = \Carbon\Carbon::parse($request->tglLahir)->format('Y-m-d');}
        if($request->alamat <> $user->alamat){$user->alamat = $request->alamat;}
        if($request->kota <> $user->kota){$user->kota = $request->kota;}
        if($request->kodePos <> $user->kode_pos){$user->kode_pos = $request->kodePos;}
        if($request->idUmat <> $user->id_umat) {
            //also need to update the Umat detail so it reflect the changes
            if(null !== $request->idUmat){
                // User sudah punya idUmat dan dia menggantinya
            }
            $user->id_umat = $request->idUmat;
            $umat = Umat::findOrFail($request->idUmat);
            $umat->id_umat = $id;
        }

        if($request->level <> $user->user_level){$user->user_level = $request->level;}
        $user->save();

        if(isset($request->sendiri)){
            if($request->sendiri){
                //editing his own
                return redirect()->route('userProfile')->withErrors(['updated' => 'Data Anda Berhasil di Perbaharui!']);
            }
        }
        return redirect()->route('listUser')->withErrors(['updated' => 'User Berhasil di Update!']);


    }

    public function edit($id){
        //show the edit form
        //edit data pribadi sendiri
        //sanity check
        if(\Auth::user()->id <> $id){
            // Jika yang data yang diminta bukan data sendiri
            if(\Auth::user()->user_level <> 1){
                //artinya request diminta oleh user biasa.
                //thus, his not authorized to open others data
                return redirect()->back()->withErrors(['errors' => 'Anda tidak mempunyai hak melakukan perubahan data!']);
            }
            //tapi jika salah, ya lanjutkan method
        }

        $data = User::findOrFail($id);


        return view('form.editUserForm', ['user' => $data, 'sendiri' => true]);
    }

    public function uploadFoto()
    {
//        dd(\Input::file(), \Session::all());
        if(\Input::file('name'));
        // getting all of the post data
        $file = array('image' => \Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required|image|mimes:jpeg,bmp,png|max:10000',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = \Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            //dd('validator fails');
            return back()->withErrors($validator);
        }
        else
        {
            // checking file is valid.
            if (\Input::file('image')->isValid())
            {
                $destinationPath = 'images\user'; // upload path
                $extension       = \Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName        = 'UID-' . \Auth::user()->id . '.' . $extension; // renameing image

                //check file exist
                if(file_exists($destinationPath.'/'.$fileName)){
                    //delete the file
                    unlink($destinationPath.'/'.$fileName);
                }

                \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                //TODO: Logika jika extensi berbeda! Replace...
                //saving to db
                \stjo\Model\User::where('id', \Auth::user()->id)
                    ->update(['path_gambar' => $fileName]);
                // sending back with message
                \Session::flash('success', 'Upload successfully');

                return \Redirect::route('userProfile');
            } else
            {
                // sending back with error message.
                \Session::flash('error', 'uploaded file is not valid');

                return \Redirect::route('profile');
            }
        }
        //return redirect()->route('profile')->withInput();
    }


}
