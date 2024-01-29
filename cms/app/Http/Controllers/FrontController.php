<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use Illuminate\Http\Request;

use App\Models\Unit;
use App\Models\Menu;
use App\Models\Pages;
use App\Models\Pimpinan;
use App\Models\Berita;
use App\Models\Link;
use App\Models\Pengumuman;
use App\Models\Logo;
use App\Models\BeritaViews;
use App\Models\Category;
use App\Models\Files;
use App\Models\Gallery;
use App\Models\InfoGrafis;
use App\Models\Slide;
use Illuminate\Support\Facades\DB;
use App\Models\Paket;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'nap');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        // $pimpinan = Pimpinan::where('unit_id', $unit)
        // ->where('active', 1)->first();


        $top_news = Berita::with('unit')->with('penulis')
                    ->where('show', 1)
                    ->where('category_id',4)
                    ->orderBy('id', 'DESC')
                    ->take(6)->get();


        $top_artikel = Berita::with('unit')->with('penulis')
        ->where('show', 1)
        ->where('category_id',2)
        ->orderBy('id', 'DESC')
        ->take(6)->get();

        $top_galery = Gallery::take(5)->get();


        // $top_news_5 = Berita::where('unit_id', $unit)
        // ->with('unit')->with('penulis')
        // ->where('show', 1)
        // ->orderBy('id', 'DESC')
        // ->take(4)->get();


        // $top_pengumuman_5 = Pengumuman::where('unit_id', $unit)
        // ->orderBy('id', 'DESC')
        // ->take(4)->get();

        // $top_news_skpd =  Berita::where('portal', 1)
        //             ->where('unit_id','<>', $unit )
        //             ->with('unit')->with('penulis')
        //             ->where('show', 1)
        //             ->orderBy('id', 'DESC')
        //             ->take(5)->get();

        // $top_aplikasi =  Aplikasi::where('unit_id', $unit)
        // ->orderBy('id', 'DESC')->get();

        // $top_link =  Link::where('unit_id', $unit)
        // ->orderBy('id', 'DESC')->get();

        // $top_opd = Unit::join('logo', function ($join) {
        //     $join->on('logo.id', '=', DB::raw("(SELECT max(id) from logo WHERE logo.unit_id = unit.id)"));
        // })->get();

        // $gallery =  Gallery::where('unit_id', $unit )
        //             ->with('penulis')
        //             ->orderBy('id', 'DESC')
        //             ->take(5)->get();

        // $slide =  Slide::where('unit_id', $unit )
        // ->orderBy('id', 'DESC')
        // ->take(3)->get();

        // $info =  InfoGrafis::where('unit_id', $unit )
        // ->with('penulis')
        // ->orderBy('id', 'DESC')
        // ->get();

        //  //statistik
        //  $postsViews= new BeritaViews();
        //  $postsViews->id_post = 0;
        //  $postsViews->titleslug = 'home';
        //  $postsViews->url = url()->current();
        //  $postsViews->session_id = session()->getId();
        //  $postsViews->ip =request()->ip();
        //  $postsViews->agent = $_SERVER['HTTP_USER_AGENT'];
        //  $postsViews->save();

         return view('tema.'.$theme.'.home', compact('menu', 'unit', 'top_news', 'top_galery', 'top_artikel'));

        //  return view('tema.'.$theme.'.home', compact('gallery', 'menu', 'unit', 'pimpinan', 'top_news', 'top_news_skpd', 'top_news_5', 'top_pengumuman_5', 'top_opd', 'top_aplikasi','top_link', 'info', 'slide'));
        // return view('tema.'.$theme.'.home', compact('gallery', $gallery, 'menu', $menu, 'unit', $unit, 'pimpinan', $pimpinan, 'top_news', $top_news, 'top_news_skpd', $top_news_skpd, 'top_news_5', $top_news_5, 'top_pengumuman_5', $top_pengumuman_5, 'top_opd', $top_opd, 'top_aplikasi', $top_aplikasi, 'top_link', $top_link));
    }

    // public function pengumuman(Request $request)
    // {
    //     $unit = env('APP_DOMAIN_ID', 1);
    //     $theme = env('APP_FRONT_THEME', 'wolio');
    //     $unit = (int)($unit);

    //     $menu = Menu::where('unit_id', $unit)
    //             ->where('parent_id', 0)->get();

    //     $pengumuman = Pengumuman::where('unit_id', $unit)
    //     ->with('unit')->with('penulis')
    //     ->orderBy('id', 'DESC')
    //     ->paginate(5);

    //     return view('tema.'.$theme.'.pengumuman', compact('pengumuman','menu', 'unit'));
    // }


    // public function pengumuman_detail(Request $request)
    // {


    //     $unit = env('APP_DOMAIN_ID', 1);
    //     $theme = env('APP_FRONT_THEME', 'wolio');
    //     $unit = (int)($unit);


    //     $pengumuman = Pengumuman::where('unit_id', $unit)
    //             ->where('id', $request->id )
    //             ->first();

    //     $menu = Menu::where('unit_id', $unit)
    //             ->where('parent_id', 0)->get();

    //     $info =  InfoGrafis::where('unit_id', $unit )
    //     ->with('penulis')
    //     ->orderBy('id', 'DESC')
    //     ->get();

    //     if (!$pengumuman){
    //         abort(404);
    //     }

    //     return view('tema.'.$theme.'.pengumuman_detail', compact('menu', 'pengumuman',  'unit', 'info'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pages(Request $request)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.pages', compact('menu'));
    }

    public function pages_detail(Request $request)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);
        $page_slug = $request->id;
        $pages = Pages::where('unit_id', $unit)
                ->where('slug', $page_slug )
                ->first();
        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $kategori = Category::get();


        if (!$pages){
            abort(404);
        }
        return view('tema.'.$theme.'.pages_detail', compact('menu', 'pages', 'unit', 'kategori'));
    }

    public function paket(Request $request)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.paket', compact('menu'));
    }

    public function paket_detail(Request $request)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);
        $page_slug = $request->id;
        $paket = Paket::where('unit_id', $unit)
                ->where('slug', $page_slug )
                ->first();
        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $kategori = Category::get();


        if (!$paket){
            abort(404);
        }
        return view('tema.'.$theme.'.paket_detail', compact('menu', 'paket', 'unit', 'kategori'));
    }

    public function agenda($id)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();
        return view('tema.'.$theme.'.agenda', compact('menu'));
    }

    public function gallery(Request $request)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $gallery = Gallery::where('unit_id', $unit)->with('penulis')
        ->orderByDesc('id')->paginate(3);
        return view('tema.'.$theme.'.gallery', compact('gallery', 'menu', 'unit'));
    }

    public function gallery_detail(Request $request)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $gallery = Gallery::where('unit_id', $unit)
        ->where('id', $request->id)->first();

        $info =  InfoGrafis::where('unit_id', $unit )
        ->with('penulis')
        ->orderBy('id', 'DESC')
        ->get();

        //statistik
        $postsViews= new BeritaViews();
        $postsViews->id_post = $gallery->id;
        $postsViews->titleslug = $gallery->slug;
        $postsViews->url = url()->current();
        $postsViews->session_id = session()->getId();
        $postsViews->ip =request()->ip();
        $postsViews->agent = $_SERVER['HTTP_USER_AGENT'];
        $postsViews->save();

        return view('tema.'.$theme.'.gallery_detail', compact('gallery', 'menu', 'unit', 'info'));
    }

    public function info(Request $request)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $info = INfoGrafis::where('unit_id', $unit)->with('penulis')
        ->orderByDesc('id')->paginate(3);

        return view('tema.'.$theme.'.info', compact('info', 'menu', 'unit'));
    }

    public function info_detail(Request $request)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $info_detail = InfoGrafis::where('unit_id', $unit)
        ->where('id', $request->id)->first();

        $info = INfoGrafis::where('unit_id', $unit)->with('penulis')
        ->orderByDesc('id')->paginate(3);
        //statistik
        $postsViews= new BeritaViews();
        $postsViews->id_post = $info_detail->id;
        $postsViews->titleslug = $info_detail->slug;
        $postsViews->url = url()->current();
        $postsViews->session_id = session()->getId();
        $postsViews->ip =request()->ip();
        $postsViews->agent = $_SERVER['HTTP_USER_AGENT'];
        $postsViews->save();

        return view('tema.'.$theme.'.info_detail', compact('info', 'info_detail', 'menu', 'unit'));
    }


    public function berita()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $berita = Berita::where('unit_id', $unit)
        ->where('category_id', 4)
        ->where('show', 1)->orderBy('id', 'DESC')
        ->paginate(4);

        $kategori = Category::get();

        $top_news = Berita::where('unit_id', $unit)
        ->where('category_id', 4)
        ->where('show', 1)->orderBy('id', 'DESC')
        ->take(5)
        ->get();

        return view('tema.'.$theme.'.berita', compact('menu', 'unit', 'berita', 'kategori', 'top_news'));
    }

    public function artikel()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $berita = Berita::where('unit_id', $unit)
        ->where('show', 1)
        ->where('category_id', 2)
        ->orderBy('id', 'DESC')
        ->paginate(4);

        $kategori = Category::get();

        $top_news = Berita::where('unit_id', $unit)
        ->where('category_id', 2)
        ->where('show', 1)->orderBy('id', 'DESC')
        ->take(5)
        ->get();

        return view('tema.'.$theme.'.artikel', compact('menu', 'unit', 'berita', 'kategori', 'top_news'));
    }

    public function berita_search(Request $request)
    {

        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $berita = Berita::where('unit_id', $unit)
        ->where('show', 1)
        ->where('title','LIKE', '%'.$request->search.'%')
        ->orderBy('id', 'DESC')
        ->paginate(4);


        return view('tema.'.$theme.'.berita', compact('menu', 'unit', 'berita'));
    }

    public function berita_category(Request $request)
    {

        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $berita = Berita::where('unit_id', $unit)
        ->where('show', 1)
        ->where('category_id', $request->id)
        ->orderBy('id', 'DESC')
        ->paginate(4);


        return view('tema.'.$theme.'.berita', compact('menu', 'unit', 'berita'));
    }

    public function berita_detail(Request $request)
    {

        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);
        $berita_slug = $request->id;

        $berita = Berita::where('id', $berita_slug )
                ->first();

        $top_news = Berita::where('unit_id', $unit)
        ->where('show', 1)->orderBy('id', 'DESC')
        ->take(5)
        ->get();

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();
        $info =  InfoGrafis::where('unit_id', $unit )
        ->with('penulis')
        ->orderBy('id', 'DESC')
        ->take(1)->get();

        $kategori = Category::get();


        //statistik
        $postsViews= new BeritaViews();
        $postsViews->id_post = $berita->id;
        $postsViews->titleslug = $berita_slug;
        $postsViews->url = url()->current();
        $postsViews->session_id = session()->getId();
        $postsViews->ip =request()->ip();
        $postsViews->agent = $_SERVER['HTTP_USER_AGENT'];
        $postsViews->save();

        if (!$berita){
            abort(404);
        }
        return view('tema.'.$theme.'.berita_detail', compact('menu', 'berita', 'unit', 'top_news', 'info', 'kategori'));
    }

    public function pimpinan()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.berita_detail', compact('menu'));
    }

    public function aplikasi()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
        ->where('parent_id', 0)->get();



        $aplikasi = Aplikasi::where('unit_id', $unit)
                ->orderBy('id', 'DESC')
                ->paginate(3);

        if (!$aplikasi){
            abort(404);
        }

        return view('tema.'.$theme.'.aplikasi', compact('aplikasi', 'menu', 'unit'));
    }

    public function opd()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
        ->where('parent_id', 0)->get();

        $opd = Unit::join('logo', 'logo.unit_id', '=', 'unit.id')->orderBy('unit.id', 'DESC')->paginate(5);


        if (!$opd){
            abort(404);
        }

        return view('tema.'.$theme.'.opd', compact('opd', 'menu', 'unit'));
    }

    public function link()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $link = Link::where('unit_id', $unit)
                ->orderBy('id', 'DESC')
                ->paginate(5);

        return view('tema.'.$theme.'.link', compact('link'));
    }

    public function download(Request $request)
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'wolio');
        $unit = (int)($unit);

        $menu = Menu::where('unit_id', $unit)
                ->where('parent_id', 0)->get();

        $file = Files::where('unit_id', $unit)->paginate(5);


        $info =  InfoGrafis::where('unit_id', $unit )
        ->with('penulis')
        ->orderBy('id', 'DESC')
        ->get();

        return view('tema.'.$theme.'.download', compact('file', 'menu', 'unit', 'info'));
    }


    public function about()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'nap');

        $menu = Menu::where('unit_id', $unit)
          ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.about', compact('menu', 'unit'));
    }

    public function bidang_praktek()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'nap');

        $menu = Menu::where('unit_id', $unit)
          ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.bidang_praktek', compact('menu', 'unit'));
    }

    public function hubungi_kami()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'nap');

        $menu = Menu::where('unit_id', $unit)
          ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.contact', compact('menu', 'unit'));
    }

    public function praktek1()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'nap');

        $menu = Menu::where('unit_id', $unit)
          ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.praktek1', compact('menu', 'unit'));
    }


    public function praktek2()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'nap');

        $menu = Menu::where('unit_id', $unit)
          ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.praktek2', compact('menu', 'unit'));
    }


    public function praktek3()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'nap');

        $menu = Menu::where('unit_id', $unit)
          ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.praktek3', compact('menu', 'unit'));
    }


    public function praktek4()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'nap');

        $menu = Menu::where('unit_id', $unit)
          ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.praktek4', compact('menu', 'unit'));
    }


    public function praktek5()
    {
        $unit = env('APP_DOMAIN_ID', 1);
        $theme = env('APP_FRONT_THEME', 'nap');

        $menu = Menu::where('unit_id', $unit)
          ->where('parent_id', 0)->get();

        return view('tema.'.$theme.'.praktek5', compact('menu', 'unit'));
    }




}
