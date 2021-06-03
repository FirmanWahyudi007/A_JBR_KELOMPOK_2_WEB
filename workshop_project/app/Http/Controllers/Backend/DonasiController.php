<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiControoler extends Controller
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
        DB::table('donasi')->insert([
            'tanggal'=>$request->tanggal,
            'nama_donasi'=>$request->donasi,
            'penerima'=>$request->penerima,
            'keterangan'=>$request->keterangan,
            'dokumentasi'=>'es.png'
        ]);
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
        DB::table('donasi')->where('id',$id)->delete();
        return redirect()->route('donasi.index')->with('success','Data Donasi Telah Dihapus');
    }
}
