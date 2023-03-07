<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Slideshow;
use App\Models\Berita;
use App\Models\Link;
use App\Models\Halaman;
use App\Models\Layanan;
use App\Models\Galeri;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Badan Penangulangan Bencana Daerah | Kabupaten Batu Bara';
        $slideshow = Slideshow::orderBy('id', 'desc')->limit(3)->get();
        // $posts = Berita::orderBy('id', 'desc')->limit(3)->get();
        $link = Link::orderBy('id', 'desc')->get();
        $banner = Banner::orderBy('id', 'desc')->limit(1)->get();
        $post_dinas = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Dinas')->limit(6)->get();
        $post_pemerintahan = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Pemerintahan')->limit(4)->get();
        $post_umum = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Umum')->limit(3)->get();
        // $post_latest = Berita::orderBy('id', 'desc')->where('kategori', '=', 'Dinas')->limit(5)->get();
        $halaman = Halaman::orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $foto = Galeri::orderBy('id', 'desc')->latest()->paginate(9);
        $setting = Setting::first();
        return view('home', compact(
            'title',
            'slideshow',
            'link',
            'banner',
            'post_dinas',
            'post_pemerintahan',
            'post_umum',
            'halaman',
            'layanan',
            'setting',
            'foto',

        ));
    }
}
