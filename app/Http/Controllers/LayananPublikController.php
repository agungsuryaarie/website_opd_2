<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Berita;
use App\Models\Halaman;
use App\Models\Banner;
use App\Models\Link;
use App\Models\Setting;
use Illuminate\Http\Request;

class LayananPublikController extends Controller
{
    public function index($slug)
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $layanan = Layanan::orderBy('id')->get();
        $lapub = Layanan::where('slug', $slug)->orderBy('id')->first();
        $recent_post = Berita::limit(4)->get();
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $banner = Banner::orderBy('id', 'desc')->limit(1)->get();
        $link = Link::orderBy('id', 'desc')->get();
        $setting = Setting::first();
        return view('layanan', compact('title', 'layanan', 'lapub', 'recent_post', 'halaman', 'banner', 'setting', 'link'));
    }
}
