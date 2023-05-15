<?php

namespace App\Http\Controllers;

use app\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KategoriController extends Controller
{
    public static function autoID() 
    {
        $query = DB::table('kategori')->select(DB::raw('max(id) as max_code'))->get();
        foreach($query as $data){
        $datas = $data->max_code;
        }
        $code = $datas;
                $urutan = (int)substr($code, 1, 3);
                $urutan++;
                $huruf = "K";
                $id_kat = $huruf . sprintf("%03s", $urutan);
        return $id_kat;
    }
    public function getData()
    {
        $data_kategori = DB::table('kategori')->get();
        // $data_kategori1 = Kategori::get();
        $id_kategori = self::autoID();
        return view('kategori', ['data_kategori' => $data_kategori, 'id_kategori' => $id_kategori]);
    }
    public function store(Request $request){
        DB::table('kategori')->insert([
            'id' => $request->tid_tambahkategori,
            'nama' => $request->tnama_tambahkategori,
        ]);
        return redirect('/kategori');
    }
    public function update(Request $request)
    {
        DB::table('kategori')->where('id',$request->tid_editkategori)->update([
            'nama' => $request->tnama_editkategori
        ]);
        return redirect('/kategori');
    }
    public function destroy(Request $request)
    {  
	DB::table('kategori')->where('id',$request->idkategori)->delete();
	return redirect('/kategori');
    }
    
}
