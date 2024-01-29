@include('tema.wolio.header')
<main>
      <!--   Weekly2-News start -->
      <div class="weekly2-news-area pt-30 pb-10 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-3">
                        <div class="home-banner2 d-none d-lg-block">
                            <img src="{{ asset('images/pimpinan/'.$pimpinan->pic)}}" class="rounded" alt="" height="315">
                            <p class="card text-center block"><br>{{ $pimpinan->nama_pimpinan }}<br>{{ $pimpinan->nama_jabatan }}</p>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>BERITA TERKINI</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        @foreach ($top_news as $top_item)
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="{{ asset('images/berita/'.$top_item->pic)}}" alt="" width="235" height="155">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="{{ route('berita_detail', $top_item->slug) }}">{{ Str::of(strip_tags($top_item->content))->words(10, ' ....') }}</a></h4>
                                                <p>{{ $top_item->unit->unit_kerja }} - {{ date('d/m/Y', strtotime($top_item->created_at))}}</p>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!-- Trending Area Start -->
    {{-- <div class="trending-area fix pt-20 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <!-- Single -->
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{ asset('images/berita/'.$top_news[0]->pic)}}" alt="Top News 1" width="750px" height="720px">
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{ $top_news[0]->category->title }}</span>
                                            <h2><a href="{{ route('berita_detail',$top_news[0]->slug) }}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{ $top_news[0]->title }}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">{{ $top_news[0]->penulis->name }} - {{ $top_news[0]->unit->unit_kerja }} - {{ date('d/m/Y', strtotime($top_news[0]->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                         <img src="{{ asset('images/berita/'.$top_news[1]->pic)}}" alt="Top News 2" width="750px" height="720px">
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{ $top_news[1]->category->title }}</span>
                                            <h2><a href="{{ route('berita_detail',$top_news[1]->slug) }}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{ $top_news[1]->title }}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">{{ $top_news[0]->penulis->name }}  -  {{ $top_news[0]->unit->unit_kerja }} -  {{ date('d/m/Y', strtotime($top_news[1]->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{ asset('images/berita/'.$top_news[2]->pic)}}" alt="Top News 2" width="750px" height="720px">
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{ $top_news[2]->category->title }}</span>
                                            <h2><a href="{{ route('berita_detail',$top_news[2]->slug) }}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{ $top_news[2]->title }}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">{{ $top_news[0]->penulis->name }}   -  {{ $top_news[0]->unit->unit_kerja }} -  {{ date('d/m/Y', strtotime($top_news[2]->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                            <!-- Trending Top -->
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{ asset('images/pimpinan/'.$pimpinan->pic)}}" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <h2><a href="latest_news.html">{{ $pimpinan->nama_pimpinan }}</a></h2>
                                            <p><strong>{{ $pimpinan->nama_jabatan }}/{{ $pimpinan->masa_jabatan }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{ asset('assets/logo/baubau3.jpeg')}}" alt="" width="381381px" height="226px">
                                        <div class="trend-top-cap trend-top-cap2">
                                            @php
                                            $slug = App\Models\Pages::where('id', $pimpinan->link)->where('unit_id', $unit)->first();
                                            @endphp
                                            <h2><a href="{{ route('pages_detail',$slug->slug) }}">{{ $slug->title }}</a></h2>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-10 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="whats-news-wrapper">
                    <!-- Heading & Nav Button -->
                    <div class="row justify-content-between align-items-end mb-15">
                        <div class="col-xl-4">
                            <div class="small-tittle mb-30">
                                <h4>INFO TERBARU</h4>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link bgr active" id="nav-home-tab" data-toggle="tab" href="#nav-berita" role="tab" aria-controls="nav-home" aria-selected="true"><h5>Berita</h5></a>
                                        <a class="nav-item nav-link bgr" id="nav-profile-tab" data-toggle="tab" href="#nav-pengumuman" role="tab" aria-controls="nav-profile" aria-selected="false"><h5>Pengumuman</h5></a>
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <!-- Tab content -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-berita" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        <!-- Left Details Caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img">
                                                    <img src="{{ asset('images/berita/'.$top_news_5[0]->pic)}}" alt="" width="360px" height="245">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="{{ route('berita_detail', $top_news_5[0]->slug) }}">{{ $top_news_5[0]->title}}</a></h4>
                                                    <span>{{ date('d/m/Y', strtotime($top_news_5[0]->created_at))}}</span>
                                                    <p>{{ Str::of(strip_tags($top_news_5[0]->content))->words(38, ' ....') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                                @foreach ($top_news_5 as $news)
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="{{ asset('images/berita/'.$news->pic)}}" alt="" width="120px" height="104">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">{{ $news->category->title }}</span>
                                                            <h4><a href="{{ route('berita_detail',$news->slug) }}">{{ $news->title }}</a></h4>
                                                            <p>{{ date('d/m/Y', strtotime($news->created_at))}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card two -->
                                <div class="tab-pane fade danger" id="nav-pengumuman" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">

                                        <!-- Right single caption -->
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                                @foreach ($top_pengumuman_5 as $pengumuman_item)
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="{{ asset('assets/logo/logo_baubau_small.png')}}" alt="" width="100">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <h4><a href="{{ url('pengumuman_detail',  $pengumuman_item->id) }}">{{ $pengumuman_item->title }}</a></h4>
                                                            <p>{{ Str::of(strip_tags($pengumuman_item->content))->words(50, ' ....') }}</p>
                                                            <p>{{ date('d/m/Y', strtotime($news->created_at))}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4">
                    @include('tema.wolio.right_widget')
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->

    <!-- End Weekly-News -->
    <div class="weekly2-news-area pt-10 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>INFO SKPD</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        @foreach ($top_news_skpd as $item_skpd)
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="{{ asset('images/berita/'.$item_skpd->pic)}}" alt="" width="345" height="227.55">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="{{ route('berita_detail', $item_skpd->slug) }}">{{$item_skpd->title}}</a></h4>
                                                <p>{{ $item_skpd->penulis->name }}  |  {{ $item_skpd->unit->unit_kerja }}</p>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="weekly2-news-area pt-10 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <a href="{{ route('daftar_gallery')}}"><h4>BERITA FOTO</h4></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                       @foreach ($gallery as $gallery_item)
                                           <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="{{ asset('images/gallery/'.$gallery_item->pic)}}" alt="" height="200">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="{{ route('gallery_detail', $gallery_item->id) }}">{{ $gallery_item->title}}</a></h4>
                                                <p>{{ $gallery_item->penulis->name }}  |  {{ date('d/m/y', strtotime($gallery_item->created_at))}}</p>
                                            </div>
                                        </div>
                                       @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <div class="weekly2-news-area pt-10 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <center><a href="{{ route('daftar_aplikasi')}}"><h4>APLIKASI DAN LAYANAN ONLINE</h4></a></center>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <center>
                                    @foreach ($top_aplikasi as $aplikasi_item)
                                        <a href="{{ $aplikasi_item->link }}"><img id="icon" src="{{ asset('images/aplikasi/'.$aplikasi_item->pic)}}"></a>
                                    @endforeach
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- End Weekly-News -->
     <div class="weekly2-news-area pt-10 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <center><a href="{{ route('daftar_opd')}}"><h4>SUB DOMAIN</h4></a></center>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <center>
                                    @foreach ($top_opd as $opd_item)
                                        <a href="{{ $opd_item->link }}"><img src="{{ asset('images/logo/'.$opd_item->pic)}}" alt="" id="icon"></a>
                                    @endforeach
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!-- End Weekly-News -->
    <div class="weekly2-news-area pt-10 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <center><h4>LINK PENTING</h4></center>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <center>
                                    @foreach ($top_link as $link_item)
                                        <a href="{{ $link_item->link }}"><img src="{{ asset('images/link/'.$link_item->pic)}}" alt="" id="icon"></a>
                                    @endforeach
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->

</main>
@include('tema.wolio.footer')
<!-- Search model Begin -->

