<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        DB::table('akuns')->where('id',$request->tid_profile)->update([
            'nama' => $request->tnama_profile,
            'email'=>$request->temail_profile,
            'password' => bcrypt($request->tpass_profile),
        ]);
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
}
