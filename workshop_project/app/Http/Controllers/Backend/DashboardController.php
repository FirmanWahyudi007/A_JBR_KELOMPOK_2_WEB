<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\Video;
use App\Models\Yayasan;
use App\Models\Artikel;

class DashboardController extends Controller
{
    public function index()
    {
      $donasi =  Donasi::count();
      $yayasan = Yayasan::count();
      $video = Video::count();
      $artikel = Artikel::count();
      $year = ['2018','2019','2020','2021','2022','2023'];
        $chart = [];
        foreach ($year as $key => $value) {
            $chart[] = Donasi::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }
      return view('backend.dashboard', compact('donasi','yayasan','video','artikel'))
      ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
      ->with('chart',json_encode($chart,JSON_NUMERIC_CHECK));;
    }
}
