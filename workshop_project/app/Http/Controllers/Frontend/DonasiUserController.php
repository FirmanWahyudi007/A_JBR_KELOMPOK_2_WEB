<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donasi;

class DonasiUserController extends Controller
{
    public function index()
    {
        # code...
        $donasi = Donasi::paginate(6);
        return view('frontend.donasi',compact('donasi'));
    }

    public function show($id)
    {
        $donasi = Donasi::find($id);
        return view('frontend.donate',compact('donasi'));
    }

    public function donate(Request $request)
    {
        # code...
        $date = Carbon::now()->toDateTimeString();
        $donate = new DetailDonasi;
        $donate->donasi = $request->donasi;
        $donate->keterangan = $request->keterangan;
        $donate->tanggal = $date;
        $donate->nominal = $request->nominal; 
        $donate->konfirmasi = 0;
        $donate->donatur = 1;
        $donate->save();
        return Redirect::back();
    }
}
