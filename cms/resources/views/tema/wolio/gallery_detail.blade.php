<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pemerintah Kota Baubau | Selamat datang</title>
    <meta name="description" content="baubau, kota seribu benteng, pemerintah kota, sulawesi tenggara, pantai indah, pantai nirwana">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="{{ $gallery->title }}"/>
    <meta property="og:image" content="{{ asset('images/gallery/'.$gallery->pic)}}"/>
    <meta property="og:url" content="{{ env('APP_URL').'/'.'gallery_detail/'.$gallery->slug }}"/>
    <meta property="og:description" content="{{ Str::of(strip_tags($gallery->content))->words(50, '....') }}"/>
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo/logo_baubau_small.png')}}">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/ticker-style.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('tema/wolio/assets/css/style.css')}}">

    <style>
        /* #icon {
        border-radius: 30px;
        border: 3px solid #ea7d59;
        padding: 1px;
        width: 150px;
        height: 150px;
        justify-content: space-between;
        margin-right: 30px;   /* Horizontal Space 
        margin-bottom: 30px;  /* Vertical Space 
        } */

        #button_share img {
            width: 60px;
            box-shadow: 0;
            padding: 6px;
            display: inline;
            border: 0;
            }
    </style>
    
</head>

<body>
<!-- Preloader Start -->
{{-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('assets/logo/logo_baubau_small.png')}}" alt="">
            </div>
        </div>
    </div>
</div> --}}
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-sm-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            {{-- <div class="header-info-left">
                                <ul>     
                                    <li class="title"><span class="flaticon-energy"></span> trending-title</li>
                                    <li>Class property employ ancho red multi level mansion</li>
                                </ul>
                            </div> --}}
                            <div class="header-info-right">
                                <ul class="header-date">
                                    <li><span class="flaticon-calendar"></span><label id=date></label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid gray-bg">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-12 col-lg-12col-md-12 d-none d-md-block">
                            <div class="logo">
                                <a href="{{ route('home')}}"><img src="{{ asset('assets/logo/header_baubau.jpg')}}" alt="baubau logo" width="100%"></a>
                            </div>
                        </div>
                        {{-- <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="{{ asset('tema/wolio/assets/img/gallery/header_card.png')}}" alt="" height="200">
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="{{ route('home')}}"><img src="{{ asset('assets/logo/baubaulogo.png')}}" width="300" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block" style="margin-top: -10px">
                                <nav>                  
                                    <ul id="navigation">
                                        <li><a href="{{ route('home')}}" style="margin-top: 0px ">BERANDA</a></li>
                                            @foreach ($menu  as $item)
                                            @php
                                            $childs = App\Models\Menu::where('parent_id', $item->id)->where('unit_id', $unit)->orderBy('sort', 'DESC')->get();
                                            $count = count($childs);
                                            @endphp
                                            <li><a href="#">{{ strtoupper($item->title) }}</a>
                                                @if ($count > 0)
                                                    <ul class="submenu" style="width: 300px">
                                                        @foreach ($childs as $child)
                                                           @php
                                                               $slug = App\Models\Pages::where('id', $child->link)->where('unit_id', $unit)->first();
                                                           @endphp     
                                                           @if ($slug)
                                                                <li><a href="{{ route('pages_detail',$slug->slug) }}">{{ $child->title }}</a></li>
                                                           @else
                                                                <li><a href="{{ $child->link }}">{{ $child->title }}</a></li>
                                                           @endif     
                                                            
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                
                                            </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>             
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="header-right f-right d-none d-lg-block" style="margin-top: -10px">
                                <!-- Heder social -->
                                <ul class="header-social">    
                                    <li><a href="https://www.fb.com/baubaukota" style="margin-top: 0px><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                        
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>


<main>
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-90">
                            <div class="heading-news mb-30 pt-30">
                                <h4>{{ $gallery->title }}</h4>
                            </div>
                            <div class="about-img">
                                <img src="{{ asset('images/gallery/'.$gallery->pic)}}" alt="">
                            </div>
                            <div class="blog-info-link">
                                <div class="social-share pt-30">
                                    <div class="section-tittle col-md-12">
                                        <ul>
                                            <p>
                                                @php
                                                $views = DB::table('berita_views')->where('id_post', $gallery->id)->count();  
                                                $share = 0;  
                                                @endphp

                                                <h4><i class="fa fa-eye"></i><span> </span> {{ $views }} views <span> </span> <i class="fa fa-share"></i><span> </span> {{ $share }} share</h4>
                                                <h4>Share :</h4>
                                                <div id="button_share" class="float-right">
                                                    <!-- Whatshap Social Media -->
                                                    <label href="#" target="_blank" onclick="window.open('whatsapp://send?text={{ env('APP_URL').'/'.'gallery_detail/'.$gallery->slug }}')">
                                                    <img src="{{ asset('assets/icon/whatsapp.png')}}"/>
                                                    </label>
                                                <!-- Facebook Social Media -->
                                                <a href="http://www.facebook.com/sharer.php?u={{ env('APP_URL').'/'.'gallery_detail/'.$gallery->slug }}" target="_blank">
                                                    <img src="{{ asset('assets/icon/facebook-new.png')}}" alt="Facebook share link" />
                                                </a>
                                                <!-- LinkedIn Social Media -->
                                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ env('APP_URL').'/'.'gallery_detail/'.$gallery->slug }}" target="_blank">
                                                    <img src="{{ asset('assets/icon/linkedin.png')}}" alt="LinkedIn share link" />
                                                </a>
                                            
                                                <!-- Twitter Social Media -->
                                                <a href="https://twitter.com/share?url={{ env('APP_URL').'/'.'gallery_detail/'.$gallery->slug }}" target="_blank">
                                                    <img src="{{ asset('assets/icon/twitter.png')}}" alt="Twitter share link" />
                                                </a>
                                                </div>
                                            
                                            </p>
                                        </ul>
                           
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="about-prea">
                                <p class="about-pera1 mb-25 text-justify"><p>{!! html_entity_decode($gallery->description) !!}</p></p>
                            </div>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> {{ $gallery->penulis->name}}</a></li>
                            </ul>

                        </div>
                     
                    </div>
                    <div class="col-lg-4">
                    @include('tema.wolio.right_widget')
                    </div>
                        
                </div>
                
        </div>
    </div>
    <!-- About US End -->
</main>
@include('tema.wolio.footer')