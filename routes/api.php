<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAkunController;
use App\Http\Controllers\ApiProdukController;
use App\Http\Controllers\ApiKeranjangController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiSimpanController;
use App\Http\Controllers\ApiTransaksiController;
use App\Http\Controllers\ApiDetailTransaksiController;
use App\Http\Controllers\ApiAntrianController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/api/login', [ApiAkunController::class, 'login']);
Route::post('/api/register', [ApiAkunController::class, 'register']);

Route::post('/api/update', [ApiUserController::class, 'update']);

Route::get('/api/dataproduk', [ApiProdukController::class, 'data']);

Route::post('/api/tambahkeranjang', [ApiKeranjangController::class, 'tambah']);
Route::post('/api/datakeranjang', [ApiKeranjangController::class, 'getData']);
Route::post('/api/hapuskeranjang', [ApiKeranjangController::class, 'hapusdata']);

Route::post('/api/tambahsimpan', [ApiSimpanController::class, 'tambah']);
Route::post('/api/datasimpan', [ApiSimpanController::class, 'getData']);
Route::post('/api/hapussimpan', [ApiSimpanController::class, 'hapusdata']);

Route::post('/api/tambahantrian', [ApiAntrianController::class, 'tambah']);
// Route::post('/tambahdetailantrian', [AntrianController::class, 'tambahdetail']);

Route::post('/api/datatransaksi', [ApiTransaksiController::class, 'getData']);

Route::post('/api/datadetailtransaksi', [ApiDetailTransaksiController::class, 'getData']);

