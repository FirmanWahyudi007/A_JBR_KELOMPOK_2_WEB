<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Storage;

class UploadVideoController extends Controller
{
    public function store(Request $request)
    {

        if ($request->hasFile('video')) {
            $files = $request->file('video');
            $newFileName = "";
                $fileExt = $files->extension();
                $newFileName = Str::random(20) . '.' . $fileExt;
                // $newFileName = $file->getClientOriginalName(); //get original name
                $files->storeAs('public/Video/temps/', $newFileName);

            return $newFileName;
        }

        return '';

    }

    public function destroy(Request $request)
    {

        $file = $request->getContent();

        Storage::delete('Video/temps/' . $file);

        return $file;

    }
}
