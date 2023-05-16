<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukdController extends Controller
{
    public static function autoID() 
    {
        $query = DB::table('produk')->select(DB::raw('max(id) as max_code'))->get();
        foreach($query as $data){
        $datas = $data->max_code;
        }
        $code = $datas;
                $urutan = (int)substr($code, 1, 5);
                $urutan++;
                $huruf = "P";
                $id_prod = $huruf . sprintf("%03s", $urutan);
        return $id_prod;
    }
    public function getData()
    {
        $data_produk = DB::table('produk')->get();
        $id_produk = self::autoID();
        $data_kategori = DB::table('kategori')->get();
        return view('produk', ['data_produk' => $data_produk, 'id_produk' => $id_produk, 'data_kategori'=>$data_kategori]);
    }
    public function store(Request $request){
        DB::table('produk')->insert([
            'id' => $request->tid_tambahkategori,
            'nama' => $request->tnama_tambahkategori,
        ]);
        return redirect('/produk');
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