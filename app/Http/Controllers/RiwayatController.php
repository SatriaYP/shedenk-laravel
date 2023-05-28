<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function getRiwayat()
    {
        $data_riwayat = DB::table('transaksi')->join('detail_transaksi', 'transaksi.id', '=', 'detail_transaksi.id_transaksi')
        ->join('akuns', 'akuns.id', '=', 'transaksi.id_akun')->groupBy('transaksi.id')->get();
        return view('riwayat', ['data_riwayat' => $data_riwayat]);
    }
}
