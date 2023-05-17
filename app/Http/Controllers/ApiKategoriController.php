<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ApiKategoriController extends Controller
{
    public function getAll(){
        $kategori = DB::table('kategori')->get();
        return Response::json($kategori,201);
    }
}
