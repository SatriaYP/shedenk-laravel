<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function getData()
    {
        $data_user = DB::table('akuns')->where('id_role','=',2)->get();
        return view('user', ['data_user' => $data_user]);
    }
    public function destroy(Request $request)
    {  
	DB::table('akuns')->where('id',$request->iduser)->delete();
	return redirect('/user');
    }
    
}
