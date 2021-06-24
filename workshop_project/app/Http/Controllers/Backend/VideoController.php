<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Video;
use Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        $no = 1;
        //dd($video);
        // $videos = $video->video;
        // $coba = Storage::url('Video/'.$videos);
        //dd($coba);
        return view('backend.list_video', compact('video','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tambah_video');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = Carbon::parse($request->tanggal);
        $file = $request->video;
        $judul = $request->judul;
        $namafile = $judul.'-'.$file;
        $videos = new Video;
        $videos->judul = $request->judul;
        $videos->tanggal = $tanggal;
        $videos->deskripsi = $request->deskripsi;
        Storage::move('public/Video/temps/'.$file, 'public/Video/'.$namafile);
        $videos->video = $namafile;
        $videos->save();
        return redirect()->route('video.index')->with('success','Video Telah Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view('backend.show_video', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        return view('backend.tambah_video', compact('video'));
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
        $tanggal = Carbon::parse($request->tanggal);
        $video = Video::find($request->id);
        $video->judul = $request->judul;
        $video->tanggal = $tanggal;
        $video->deskripsi = $request->deskripsi;
        $video->save();
        return redirect()->route('video.index')->with('succes', 'Video Berhasil di perbaharui!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::where('id', $id)->delete();
        return redirect()->route('video.index')->with('error', 'Video Berhasil di Hapus!');
    }
}
