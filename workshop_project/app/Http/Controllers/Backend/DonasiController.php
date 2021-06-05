<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use File;

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
        return view('backend.tambah_donasi', compact('donasi'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'donasi' => 'required',
            'tanggal' => 'required',
            'penerima' => 'required',
            'keterangan'=>'required|min:10',
            'dokumentasi' => 'required|mimes:png,jpg,jpeg',
            'banner' => 'required|mimes:png,jpg,jpeg'
         ]);
        $tanggal = now();
        $date = Carbon::parse($request->tanggal);

        // $t = $request->tanggal;
        // //$newDate = Carbon::createFromFormat('mm/dd/yyyy', $t)->format('yyyy/mm/dd');
        // $updatedDateFormat =  Carbon::createFromFormat('m-d-Y', $t)->format('Y-m-d H:i:s');

        //dd($updatedDateFormat);
        if($request->hasfile('dokumentasi') && $request->hasfile('banner')){
            $dokumentasi = $request->file('dokumentasi');
            $banner = $request->file('banner');
            $namadokumen = $dokumentasi->getClientOriginalName();
            $namabanner = $banner->getClientOriginalName();
            $pathdoukumen = $dokumentasi->move('images',$namadokumen);
            $pathbanner = $banner->move('images',$namabanner);
            DB::table('donasi')->insert([
                'nama_donasi'=>$request->donasi,
                'tanggal'=>$date,
                'yayasan'=>$request->penerima,
                'keterangan'=>$request->keterangan,
                'banner' => $namabanner,
                'is_active' => 1,
                'dokumentasi'=>$namadokumen,
                'created_at' => $tanggal,
                'updated_at' => $tanggal,
            ]);
        }
        return redirect()->route('donasi.index')->with('success','Data Donasi Telah Tersimpan');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $yayasan=DB::table('donasi')->where('id',$id)->first();
        return view('backend.tambah_donasi',compact('donasi'));
    }
    public function update(Request $request, $id)
    {
        DB::table('donasi')->where('id',$request->id)->update([
                'tanggal'=>$request->tanggal,
                'nama_donasi'=>$request->donasi,
                'penerima'=>$request->penerima,
                'keterangan'=>$request->keterangan,
            'dokumentasi'=>'1'
        ]);
        return redirect()->route('donasi.index')->with('success','Data Donasi Telah Diperbaharui');
    }
    public function destroy($id)
    {
        $gambar = DB::table('donasi')->where('id',$id)->first();
	    File::delete('images/'.$gambar->banner);
        File::delete('images/'.$gambar->dokumentasi);
        DB::table('donasi')->where('id',$id)->delete();
        return redirect()->route('donasi.index')->with('success','Data Donasi Telah Dihapus');
    }
}
