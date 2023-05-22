<?php

namespace App\Http\Controllers;
use App\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class AdminController extends Controller
{
    public static function autoID() 
    {
        $query = DB::table('akuns')->select(DB::raw('max(id) as max_code'))->where('id_role','=',1)->get();
        foreach($query as $data){
        $datas = $data->max_code;
        }
        $code = $datas;
                $urutan = (int)substr($code, 1, 3);
                $urutan++;
                $huruf = "A";
                $id_usr = $huruf . sprintf("%03s", $urutan);
        return $id_usr;
    }
    public function getAdmin()
    {
        $data_admin = DB::table('akuns')->where('id_role','=',1)->get();    
        $id_admin = self::autoID();
        return view('admin', ['data_admin' => $data_admin, 'id_admin' => $id_admin]);
    }
    public function store(Request $request){
        DB::table('akuns')->insert([
            'id' => $request->tid_tambahadmin,
            'nama' => $request->tnama_tambahadmin,
            'email' => $request->temail_tambahadmin,
            'password' => bcrypt($request->tpassword_tambahadmin),
            'hobi' => $request->thobi_tambahadmin,
            'id_role' => 1,
        ]);
        Alert::success('Selamat !', 'Data Admin Berhasil Ditambahkan');
        return redirect('/admin');
    }
    public function update(Request $request)
    {
        DB::table('akuns')->where('id',$request->tid_editadmin)->update([
            'nama' => $request->tnama_editadmin,
            'email' => $request->temail_editadmin,
            'password' => bcrypt($request->tpassword_editadmin),
        ]);
        Alert::success('Selamat !', 'Data Admin Berhasil Diubah');
        return redirect('/admin');
    }
    public function destroy(Request $request)
    {  
	DB::table('akuns')->where('id',$request->idadmin)->delete();
    Alert::success('Selamat !', 'Data Admin Berhasil Dihapus');
	return redirect('/admin');
    }
    
}
