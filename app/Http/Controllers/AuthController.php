<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        if(!\Auth::attempt(['email'=>$request->txt_email, 'password'=>$request->txt_password])){
            return redirect()->back();
            // return redirect()->route('home');
        }
        return redirect()->route('dashboard');

        // $email = $request->input('txt_email');
        // $password = $request->input('txt_password');

        // if ($email == '' || $password == '') {
        //     return redirect('login?error=Email dan Password wajib diisi');
        // } else if ($email != '  ' || $password != '  ') {
        //     return redirect('login?error=Email dan Password salah');
        // } else {
        //     return redirect('home');
        // }   
    }
    public function logout(Request $request)    
    {
        \Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
}
