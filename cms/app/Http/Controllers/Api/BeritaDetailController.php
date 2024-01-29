<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\BeritaViews;
use Illuminate\Http\Request;
use App\Http\Resources\BeritaResource;

class BeritaDetailController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;
        $id_berita = $request->id;
        //get posts
        $berita= Berita::find($id_berita);
        $berita_slug = $berita->slug;

        $news = Berita::where('id', $id_berita)->with('penulis')->with('category')->get();

        //statistik

        $postsViews= new BeritaViews();
        $postsViews->id_post = $berita->id;
        $postsViews->titleslug = $berita_slug;
        $postsViews->url = url()->current();
        $postsViews->session_id = session()->getId();
        $postsViews->ip =request()->ip();
        // $postsViews->agent = $_SERVER['HTTP_USER_AGENT'];
        $postsViews->save();

        if (!$berita){
            abort(404);
        }
        //return collection of posts as a resource
        return new BeritaResource(true, 'Detail Berita', $news);
    }
}
