@extends('layouts.app')

@section('content')
    <div class="slideshow">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($slideshow as $s)
                    <div class="carousel-item active">
                        <img src="{{ url('storage/slideshow/' . $s->gambar ?? '') }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <main id="main">
        <section class="blog">
            <div class="container-f" data-aos="fade-up" data-aos-delay="100">
                <div class="section-tittle mb-20">
                    <div class="d-flex bd-highlight">
                        <h2 class="flex-grow-1 bd-highlight">Berita Dinas</h2>
                        <div class="bd-highlight" id="event-more">
                            <div class="view-more">
                                <a href="{{ route('post.dinas') }}"
                                    class="d-flex align-items-center jss-cinfo text-hover-primary mb-10">Lihat semua
                                    <i
                                        class="fad fa-chevron-double-right d-none d-md-block d-lg-block py-1 px-1 jss-cinfo"></i>>></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gy-4 posts-list">
                    @foreach ($post_dinas as $post)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100">
                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ url('storage/berita', $post->foto) }}" alt="">
                                    <span class="post-date">{{ $post->tanggal }}</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $post->judul }}</h3>

                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-clock"></i> <span class="ps-2">{{ $post->jam }} WIB</span>
                                        </div>
                                        <span class="px-3 text-black-50">/</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-folder2"></i> <span class="ps-2">{{ $post->kategori }}</span>
                                        </div>
                                    </div>
                                    <hr>

                                    <a href="{{ route('post.show', $post->slug) }}"
                                        class="readmore stretched-link"><span>Read More</span><i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="blog">
            <div class="popular-tours g-pb-20" id="Popular-Tours">
                <div class="container-f" data-aos="fade-up" data-aos-delay="100">
                    <div class="section-tittle">
                        <div class="d-flex bd-highlight">
                            <h2 class="flex-grow-1 bd-highlight">Berita Pemerintahan</h2>
                            <div class="bd-highlight" id="event-more">
                                <div class="view-more">
                                    <a href="{{ route('post.pemerintahan') }}"
                                        class="d-flex align-items-center jss-cinfo text-hover-primary mb-10">Lihat semua <i
                                            class="fad fa-chevron-double-right d-none d-md-block d-lg-block py-1 px-1 jss-cinfo"></i>>></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-left">
                        @foreach ($post_pemerintahan as $post)
                            <div class="col-md-3 col-xs-6 col-2xs-12 g-mb-30">
                                <div class="popular-tours-item">
                                    <div class="img-wrapper img-wrapper--shadow">
                                        <img src="{{ url('storage/berita/' . $post->foto) }}" alt="ALT"
                                            class="img-responsive">
                                    </div>
                                    <div class="popular-tours-item-info blog-grid">
                                        <div class="popular-tours-item-info-inner">
                                            <h3><em>{{ $post->judul }}</em></h3>
                                            <ul class="blog-grid-info">
                                                <li><i class="bi bi-calendar"></i>
                                                    Selasa, 21 Februari 2023</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="{{ route('post.show', $post->slug) }}" class="popular-tours-item__more"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- <section id="portfolio" class="portfolio">
            <div class="container-f" data-aos="fade-up">
                <div class="section-title">
                    <h2>Galeri Foto</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">
                    @foreach ($foto as $f)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ url('storage/galeri/' . $f->cover) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>App 1</h4>
                                    <p>App</p>
                                </div>
                                <div class="portfolio-links">
                                    @foreach ($detail as $d)
                                        <a href="{{ url('storage/foto/' . $d->foto) }}" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i>
                                            <span>
                                                <img class="img-responsive" src="{{ url('storage/foto/' . $d->foto) }}"
                                                    alt="">
                                            </span>
                                        </a>
                                        <a href="portfolio-details.html" title="More Details"><i
                                                class="bx bx-link"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}


        <section class="testimonials section-bg">
            <div class="container-f" data-aos="fade-up">
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($link as $l)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="{{ url('storage/link/' . $l->gambar) }}" class="testimonial-img"
                                        alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script type="text/javascript">
        $('.slider').slick({
            dots: true,
            infinite: false,
            speed: 400,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
@endsection
