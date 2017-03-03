<?php

namespace stjo\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Model\User;
use Illuminate\Support\Facades\Auth;

class SigkatAuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    //
    public function getLogin()
    {
        //check if there is a user logged in,
        // then redirect to Home
        //dd(Auth::check());
        if(Auth::check() === true){
           return redirect()->route('home')->withErrors(['errors' => 'Anda sudah Login']);
        }
        return view('form.loginForm');
    }


    public function postLogin(Request $request)
    {
        //$username = Request::input('username');
        $username = $request->username;
        //$password = Request::input('password');
        $password = $request->password;

        if(Auth::attempt(['username' => $username, 'password' => $password])) {
            //dd('sukses');
            //timestamp the time login
            User::where('id', Auth::user()->id)
                            ->firstOrFail()
                            ->update(['kunjungan_terakhir' => \Carbon\Carbon::now()])
            ;

            return redirect()->route('userProfile',['id'=> Auth::user()->id]);
        }
        else {
            return redirect('login')->withErrors(['errors' => 'Username atau Password Salah']);
        }
    }


    public function getLogout()
    {
        // buat nge logout user, then redirect to main page
        Auth::logout();

        return redirect()->route('home')->withErrors(['errors' => 'Anda sudah logout. Terima Kasih']);

    }
}
