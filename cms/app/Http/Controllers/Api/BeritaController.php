<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Resources\BeritaResource;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $berita = Berita::where('unit_id', $id)
        ->with('unit')->with('penulis')->with('category')
        ->orderBy('id', 'DESC')->take(20)->get();
        //return collection of posts as a resource

        return new BeritaResource(true, 'List Berita', $berita);
    }

    public function top_news(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $berita = Berita::where('unit_id', $id)
        ->with('unit')->with('penulis')->with('category')
        ->orderBy('id', 'DESC')->take(4)->get();
        //return collection of posts as a resource
        
        return new BeritaResource(true, 'Tajuk Utama Berita', $berita);
    }
}
