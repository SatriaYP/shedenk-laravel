<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getAll()
    {
        $queryTransaksi = DB::table('transaksi')->select('id')->count();
        $queryProdukTerjual = DB::table('produk')->select('*')->where('status','=','Terjual')->count();
        $queryProdukTersisa = DB::table('produk')->select('*')->where('status','=','Tersedia')->count();
        $queryTotalHarga = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total_harga'))->whereMonth('tgl_transaksi', Carbon::now())->get();
        $januari = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '1')->whereYear('tgl_transaksi', Carbon::now())->get();
        $februari = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '2')->whereYear('tgl_transaksi', Carbon::now())->get();
        $maret = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '3')->whereYear('tgl_transaksi', Carbon::now())->get();
        $april = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '4')->whereYear('tgl_transaksi', Carbon::now())->get();
        $mei = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '5')->whereYear('tgl_transaksi', Carbon::now())->get();
        $juni = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '6')->whereYear('tgl_transaksi', Carbon::now())->get();
        $juli = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '7')->whereYear('tgl_transaksi', Carbon::now())->get();
        $agustus = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '8')->whereYear('tgl_transaksi', Carbon::now())->get();
        $september = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '9')->whereYear('tgl_transaksi', Carbon::now())->get();
        $oktober = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '10')->whereYear('tgl_transaksi', Carbon::now())->get();
        $november = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '11')->whereYear('tgl_transaksi', Carbon::now())->get();
        $desember = DB::table('transaksi')->select(DB::raw('sum(total_harga) as total'))->whereMonth('tgl_transaksi', '12')->whereYear('tgl_transaksi', Carbon::now())->get();
        return view('dashboard', ['queryTransaksi' => $queryTransaksi, 'queryProdukTerjual' => $queryProdukTerjual, 'queryProdukTersisa' => $queryProdukTersisa, 'queryTotalHarga' => $queryTotalHarga, 'januari'=> $januari, 'februari'=> $februari, 'maret'=> $maret, 'april'=> $april, 'mei'=> $mei, 'juni'=> $juni, 'juli'=> $juli, 'agustus'=> $agustus, 'september'=> $september, 'oktober'=> $oktober, 'november'=> $november, 'desember'=> $desember]);
    }
}