<?php
  
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Pages;
use App\Models\Aplikasi;
use Illuminate\Support\Facades\Auth;
  
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $unit = auth::user()->unit_id;
        $berita = Berita::where('unit_id', $unit)->count();   
        $halaman = Pages::where('unit_id', $unit)->count();
        $pengumuman = Pengumuman::where('unit_id', $unit)->count();
        $aplikasi = Aplikasi::where('unit_id', $unit)->count();
        $news = Berita::where('unit_id', $unit)
        ->with('category')
        ->orderBy('id', 'DESC')
        ->offset(0)->limit(10)->get();
        return view('dashboard', compact('unit', 'berita', 'halaman', 'pengumuman', 'aplikasi', 'news'));
    }   
}