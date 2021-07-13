<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yayasan;

class YayasanApiController extends Controller
{
    public function index()
    {
        # code...
        $yayasan = Yayasan::all();
        return response()->json(['code' => 201,'message' => 'success', 'data' => $yayasan  ]);
    }

    public function show($id)
    {
        # code...
        $yayasan = Yayasan::find($id)->first();
        if ($yayasan) {
            # code...
            return response()->json(['kode' => 201,'pesan' => 'success', 'data' => $yayasan  ]);
        } else {
            # code...
            return response()->json(['kode' => 404,'pesan' => 'error', 'data' => 'Data not Found'  ]);
        }
        
    }
}
