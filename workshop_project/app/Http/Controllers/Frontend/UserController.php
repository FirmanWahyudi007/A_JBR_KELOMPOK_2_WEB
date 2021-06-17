<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Donasi;

class UserController extends Controller
{
    public function index()
    {
        # code...
        $donasi = Donasi::all();
        $artikel = Artikel::all();
        return view('frontend.home', compact('artikel','donasi'));
    }
}
