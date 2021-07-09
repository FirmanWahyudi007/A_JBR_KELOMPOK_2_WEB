<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Yayasan;
use App\Models\Donasi;
use App\Models\DetailDonasi;
use File;
use Auth;

class DonasiController extends Controller
{
    public function index()
    {
        $donasi = DB::table('donasi')->get();
        return view('backend.data_donasi', compact('donasi'));
    }
    public function create()
    {
        $donasi=null;
        $yayasan = Yayasan::all();
        return view('backend.tambah_donasi', compact('donasi','yayasan'));
    }
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $this->validate($request, [
            'donasi' => 'required',
            'tanggal' => 'required',
            'keterangan'=>'required|min:10',
            'banner' => 'required|mimes:png,jpg,jpeg'
         ]);
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);
        if($request->hasfile('banner')){
            $banner = $request->file('banner');
            $namabanner = $request->donasi.' '.$banner->getClientOriginalName();
            $pathbanner = $banner->move('images',$namabanner);
            $donasi = new Donasi;
            $donasi->nama_donasi = $request->donasi;
            $donasi->tanggal = $date;
            if($request->penerima){
                $donasi->penerima = $request->penerima;
            }
            if($request->yayasan){
                $donasi->yayasan = $request->yayasan;
            }
            $donasi->keterangan = $request->keterangan;
            $donasi->banner = $namabanner;
            $donasi->is_active = 1;
            $donasi->user = $id;
            $donasi->save();
        }
        return redirect()->route('donasi.index')->with('success','Data Donasi Telah Tersimpan');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $donasi=DB::table('donasi')->where('id',$id)->first();
        return view('backend.tambah_donasi',compact('donasi'));
    }
    public function update(Request $request, $id)
    {
        $date = Carbon::parse($request->tanggal);
        DB::table('donasi')->where('id',$request->id)->update([
                'tanggal'=>$date,
                'nama_donasi'=>$request->donasi,
                'yayasan'=>$request->penerima,
                'keterangan'=>$request->keterangan,
        ]);
        return redirect()->route('donasi.index')->with('success','Data Donasi Telah Diperbaharui');
    }
    public function nonactive($id)
    {
        DB::table('donasi')->where('id',$id)->update([
            'is_active'=>0,
        ]);
        return redirect()->route('donasi.index')->with('success','Data Donasi Telah Dinonaktifkan');
    }
    public function active($id)
    {
        DB::table('donasi')->where('id',$id)->update([
            'is_active'=>1,
        ]);
        return redirect()->route('donasi.index')->with('success','Data Donasi Telah Diaktifkan');
    }

    public function detailDonasi()
    {
        # code...
        $no = 1;
        $detail = DetailDonasi::join('users', 'detail_donasi.users', '=', 'users.id')->get(['detail_donasi.*', 'users.name']);
        return view('backend.detaildonasi', compact('no','detail'));
    }

    public function approve(Request $request,$id)
    {
        # code...
            $detail = DetailDonasi::find($id);
            $detail->konfirmasi = 1;
            $detail->save();
        
        
        return redirect()->route('donasi.detail')->with('success','Donasi Dikonfirmasi');
    }

    public function disapprove($id)
    {
        # code...
        $detail = DetailDonasi::find($id);
        File::delete('images/buktitransfer/'.$detail->bukti_transfer);
        $detail->konfirmasi = 0;
        $detail->save();
        return redirect()->route('donasi.detail')->with('error','Bukti salah');
    }
}
