<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AntrianController extends Controller
{
    public function getAntrian()
    {
        $data_antrian = DB::table('antrian')->join('detail_antrian', 'antrian.id', '=', 'detail_antrian.id_transaksi')->join('akuns', 'akuns.id', '=', 'antrian.id_akun')->groupBy('antrian.id')->get();
        return view('antrian', ['data_antrian' => $data_antrian]);
        // dd($data_riwayat);
    }
    public function store(Request $request){
        // dd($request->id_antrian);
        $data_antrian = DB::table('antrian')->where('id',$request->id_antrian)->get();
        $data_antrian_detail = DB::table('detail_antrian')->where('id_transaksi',$request->id_antrian)->get();
        // dd($data_antrian);
        foreach($data_antrian as $data){
            DB::table('transaksi')->insert([
                'id' => $data->id,
                'tgl_transaksi' => $data->tgl_transaksi,
                'total_harga' => $data->total_harga,
                'id_akun' => $data->id_akun,
            ]);    
        }
        foreach($data_antrian_detail as $data_detail){
            DB::table('detail_transaksi')->insert([
                'id_transaksi' => $data_detail->id_transaksi,
                'id_produk' => $data_detail->id_produk,
                'kuantitas' => '1',
            ]);    
        }
        DB::table('detail_antrian')->where('id_transaksi',$request->id_antrian)->delete();
	    DB::table('antrian')->where('id',$request->id_antrian)->delete();
        Alert::success('Selamat !', 'Transaksi Berhasil Ditambahkan');
        return redirect('/antrian');
    }   
    public function destroy(Request $request)
    {  
        DB::table('detail_antrian')->where('id_transaksi',$request->idtransaksi)->delete();
	    DB::table('antrian')->where('id',$request->idtransaksi)->delete();
        Alert::success('Selamat !', 'Transaksi Berhasil Dibatalkan');
	    return redirect('/antrian');
    }
}