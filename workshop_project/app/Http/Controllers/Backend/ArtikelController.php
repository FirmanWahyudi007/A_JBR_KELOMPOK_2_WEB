<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'artikel' => Artikel::orderBy('id', 'asc')->get(),
        ];
        return view('backend.data_artikel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tambah_artikel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url_artikel = $request->url_artikel;
        $sampul = $request->sampul;
        $judul_artikel = $request->judul_artikel;
        $isi_artikel = $request->isi_artikel;
        $tanggal = $request->tanggal;
        $sampulName = $sampul->getClientOriginalName();
        $sampul->move(public_path('img'),$sampulName);

        $artikel = new Artikel();
        $artikel -> url_artikel = $url_artikel;
        $artikel -> sampul = $sampulName;
        $artikel -> judul_artikel = $judul_artikel;
        $artikel -> isi_artikel = $isi_artikel;
        $artikel -> tanggal = $tanggal;
        $artikel -> save();
        return redirect()->route('artikel.index')->with('success', 'Data Pengalaman Kerja Berhasil di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'artikel' => Artikel::where('id', $id)->first(),
        ];
        return view('backend.edit_artikel', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Artikel::where('id', $id)->update([
            'url_artikel' => $request->url_artikel,
            'sampul' => $request->sampul,
            'judul_artikel' => $request->judul_artikel,
            'isi_artikel' => $request->isi_artikel,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('artikel.index')->with('success', 'Data Pengalaman Kerja Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artikel::where('id', $id)->delete();
        return redirect()->route('artikel.index')->with('success', 'Data Pengalaman Kerja Berhasil di Hapus!');
    }
}
