<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Akun;
use RealRashid\SweetAlert\Facades\Alert;
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    { 
        if(Auth::attempt(['email'=>$request->txt_email, 'password'=>$request->txt_password])){
            // dd(auth()->user()->id);
            $request->session()->put('id', Auth::user()->id);
            $request->session()->put('nama', Auth::user()->nama);
            $request->session()->put('email', Auth::user()->email);
            $request->session()->put('password', Auth::user()->password);
            $request->session()->put('id_role', Auth::user()->id_role);
            $request->session()->put('api_token', Auth::user()->api_token);
            $request->session()->put('hobi', Auth::user()->hobi);
            return redirect()->route('dashboard');
        }else{
            Alert::error('Gagal Login !', 'Username atau Password Salah !');
            return redirect()->back();
        }
    }
    public function logout(Request $request)    
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
}
