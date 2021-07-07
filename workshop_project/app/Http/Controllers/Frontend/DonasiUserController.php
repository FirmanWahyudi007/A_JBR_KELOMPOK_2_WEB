<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\DetailDonasi;
use Carbon\Carbon;
use Redirect;
use Auth;


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
        if (!Auth::user()) {
            # code...
            return redirect()->route('login');
        }
        $donasi = Donasi::find($id);
        return view('frontend.donate',compact('donasi'));
    }

    public function donate(Request $request)
    {
        # code...
        $id = Auth::user()->id;
        $date = Carbon::now()->toDateTimeString();
        $donate = new DetailDonasi;
        $donate->donasi = $request->donasi;
        $donate->keterangan = $request->keterangan;
        $donate->tanggal = $date;
        $donate->nominal = $request->nominal; 
        $donate->konfirmasi = 0;
        $donate->users = $id;
        $donate->save();
        return Redirect::back();
    }

    public function list()
    {
        # code...
        $no = 1;
        $donasi = DetailDonasi::join('donasi', 'detail_donasi.donasi', '=', 'donasi.id')->get(['detail_donasi.*', 'donasi.nama_donasi']);
        return view('frontend.listdonasi', compact('donasi','no'));
    }

    public function uploadbukti($id)
    {
        # code...
        $detail = DetailDonasi::findOrFail($id);
        return view('frontend.buktidonasi', compact('detail'));
    }
    
    public function updatebukti(Request $request)
    {
        # code...
        if ($request->hasfile('bukti')) {
            $bukti = $request->file('bukti');
            $namabukti = $request->id.'-'.$bukti->getClientOriginalName();
            $pathbukti = $bukti->move('images/buktitransfer',$namabukti);
            $detail = DetailDonasi::find($request->id);
            $detail->bukti_transfer = $namabukti;
            $detail->konfirmasi = 2;
            $detail->save();
        }

        return redirect()->route('donasiuser.list');
    }
}
