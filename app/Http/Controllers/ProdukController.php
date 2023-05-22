<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
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
                $id_prod = $huruf . sprintf("%05s", $urutan);
        return $id_prod;
    }
    public function getData()
    {
        $data_produk = DB::table('produk')->get();
        $id_produk = self::autoID();
        $data_kategori = DB::table('kategori')->select('id','nama')->get();
        $data_gambar = DB::table('gambar')->get();
        return view('produk', ['data_produk' => $data_produk, 'id_produk' => $id_produk, 'data_kategori'=>$data_kategori, 'data_gambar'=>$data_gambar]);
    }
    public function store(Request $request){
        DB::table('produk')->insert([
            'id' => $request->id_produk,
            'nama' => $request->nama_produk,
            'id_kategori'=>$request->id_kategori,
            'harga' => $request->harga,
            'deskripsi'=> $request->deskripsi,
            'status'=>'Tersedia',
        ]);
        foreach($request->foto as $foto){
            DB::table('gambar')->insert([
                'id_produk' => $request->id_produk,
                'nama' => $foto->getClientOriginalName(),
            ]);
            $destinationPath = public_path().'/upload' ;
            $foto->move($destinationPath,$foto->getClientOriginalName());
        }
        Alert::success('Selamat !', 'Data Produk Berhasil Ditambahkan');
        return redirect('/produk');
    }
    public function update(Request $request)
    {
        DB::table('produk')->where('id',$request->tid_editproduk)->update([
            'nama' => $request->tnama_editproduk,
            'id_kategori'=>$request->tkategori_editproduk,
            'harga' => $request->tharga_editproduk,
            'deskripsi'=> $request->tdeskripsi_editproduk,
            'status'=>$request->tstatus_editproduk,
        ]);
        Alert::success('Selamat !', 'Data Produk Berhasil Diubah');
        return redirect('/produk');
    }
    public function destroy(Request $request)
    {  
	DB::table('produk')->where('id',$request->idproduk)->delete();
    $data_gambar = DB::table('gambar')->where('id_produk',$request->idproduk)->get();
    $destinationPath = public_path().'/upload';
    // dd($data_gambar);
    foreach($data_gambar as $data){
        File::delete($destinationPath.'/'.$data->nama);
        }
    DB::table('gambar')->where('id_produk',$request->idproduk)->delete();
    Alert::success('Selamat !', 'Data Produk Berhasil Dihapus');
	return redirect('/produk');
    }
}