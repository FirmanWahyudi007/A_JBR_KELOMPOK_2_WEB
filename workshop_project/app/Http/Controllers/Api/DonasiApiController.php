<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donasi;

class DonasiApiController extends Controller
{
    public function index()
    {
        # code...
        $donasi = Donasi::where('is_active','1')
            ->join('yayasan','yayasan.id','=','donasi.yayasan')
            ->join('users','users.id','=','donasi.user')
            ->get(['yayasan.nama_yayasan','users.name','donasi.*']);
        return response()->json(['code' => 201,'message' => 'success', 'data' => $donasi  ]);
    }
}
