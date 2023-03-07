<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\berita;
use App\Models\Banner;
use App\Models\Foto;
use App\Models\Video;
use App\Models\Halaman;
use App\Models\Layanan;
use App\Models\Setting;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $foto = Galeri::orderBy('id', 'desc')->latest()->paginate(9);
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('foto', compact('title', 'foto', 'halaman', 'layanan', 'setting'));
    }

    public function show($id)
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $foto = Galeri::orderBy('id', 'desc')->first();
        $detail = Foto::where('galeri_id', $id)->get();
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $setting = Setting::first();
        return view('foto_show', compact('title', 'foto', 'detail', 'halaman', 'layanan', 'setting'));
    }

    public function video()
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $video = Video::orderBy('id', 'desc')->latest()->paginate(9);
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $banner = Banner::orderBy('id', 'desc')->limit(1)->get();
        $setting = Setting::first();
        return view('video', compact('title', 'video', 'setting', 'banner', 'halaman', 'layanan'));
    }
    public function showv(Video $video)
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $banner = Banner::orderBy('id', 'desc')->limit(1)->get();
        $recent_post = Berita::limit(4)->get();
        $setting = Setting::first();
        return view('video_show', compact('title', 'video', 'halaman', 'banner', 'layanan', 'recent_post', 'setting'));
    }
}
