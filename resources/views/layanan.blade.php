@extends('layouts.app')

@section('content')
    <section class="section-content">
        <div class="container">
            <div class="row-news">
                <div class="card-details">
                    <img src="{{ url('storage/layanan', $lapub->gambar) }}">
                    <ul class="blog-info">
                        <li><i class="bi bi-calendar"></i> {{ $lapub->tanggal }}</li>
                        <li><i class="bi bi-clock"></i> {{ $lapub->jam }} WIB</li>
                    </ul>
                    <h3>{{ $lapub->judul }}</h3>
                    <p>{!! $lapub->isi_halaman !!}</p>
                </div>


                <div class="section-left">
                    <div class="mb-20">
                        @foreach ($banner as $b)
                            <img src="{{ url('storage/banner', $b->gambar) }}" style="width: 100%" alt="">
                        @endforeach
                    </div>
                    <div class="recent-post">
                        <h4 class="mb-20">Berita Lainnya</h4>
                        @foreach ($recent_post as $rpost)
                            <div class="blog-thumb blog-thumb-circle mb-10">
                                <div class="blog-thumb-hover">
                                    <img class="rounded-x" src="{{ url('storage/berita/' . $rpost->foto) }}" alt="">
                                </div>
                                <div class="blog-thumb-desc">
                                    <h3><a href="{{ route('post.show', $rpost->slug) }}">{{ $rpost->judul }}</a></h3>
                                    <ul class="blog-thumb-info">
                                        <li> {{ $rpost->tanggal }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials section-bg">
        <div class="container-f" data-aos="fade-up">
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($link as $l)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ url('storage/link/' . $l->gambar) }}" class="testimonial-img" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
@endsection
