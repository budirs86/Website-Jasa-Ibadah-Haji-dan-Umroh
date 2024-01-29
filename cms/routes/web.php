<?php

use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LogoController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PPIDCategoryController;
use App\Http\Controllers\PPIDDocumentController;
use App\Http\Controllers\MenuFrontController;
use App\Http\Controllers\MenuFrontDetailController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\PpidPermohonanController;
use App\Http\Controllers\PaketController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Activate on production env
if (App::environment('production')) {
    URL::forceScheme('https');
}

//frontend route
Route::get('/',[FrontController::class, 'home'])->name('home');

Route::get('berita',[FrontController::class, 'berita'])->name('daftar_berita');
Route::get('artikel',[FrontController::class, 'artikel'])->name('daftar_artikel');

Route::get('berita_detail/{id}',[FrontController::class, 'berita_detail'])->name('berita_detail');
Route::post('berita_search',[FrontController::class, 'berita_search'])->name('cari_berita');
Route::get('berita_category',[FrontController::class, 'berita_category'])->name('berita_category');

Route::get('pengumuman',[FrontController::class, 'pengumuman'])->name('daftar_pengumuman');
Route::get('pengumuman_detail/{id}',[FrontController::class, 'pengumuman_detail'])->name('pengumuman_detail');

Route::get('pages',[FrontController::class, 'pages'])->name('list_pages');
Route::get('pages_detail/{id}',[FrontController::class, 'pages_detail'])->name('pages_detail');

Route::get('paket',[FrontController::class, 'paket'])->name('list_paket');
Route::get('paket_detail/{id}',[FrontController::class, 'paket_detail'])->name('paket_detail');


Route::get('gallery',[FrontController::class, 'gallery'])->name('daftar_gallery');
Route::get('gallery_detail/{id}',[FrontController::class, 'gallery_detail'])->name('gallery_detail');

Route::get('file',[FrontController::class, 'file'])->name('daftar_file');
Route::get('file_detail/{id}',[FrontController::class, 'file_detail'])->name('file_detail');

Route::get('download',[FrontController::class, 'download'])->name('download');

Route::get('about',[FrontController::class, 'about'])->name('about');
Route::get('bidang_praktek',[FrontController::class, 'bidang_praktek'])->name('bidang_praktek');
Route::get('hubungi_kami',[FrontController::class, 'hubungi_kami'])->name('hubungi_kami');
Route::get('compro',[FrontController::class, 'compro'])->name('compro');

Route::get('praktek1',[FrontController::class, 'praktek1'])->name('praktek1');
Route::get('praktek2',[FrontController::class, 'praktek2'])->name('praktek2');
Route::get('praktek3',[FrontController::class, 'praktek3'])->name('praktek3');
Route::get('praktek4',[FrontController::class, 'praktek4'])->name('praktek4');
Route::get('praktek5',[FrontController::class, 'praktek5'])->name('praktek5');





Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    // Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])
    ->name('dashboard');

});

Route::middleware(['auth', 'user-access:manager'])->group(function () {

    //Menu
    Route::get('admin/menu', [MenuController::class, 'home'])->name('menu');
    Route::get('admin/menu/create', [MenuController::class, 'create'])->name('menu_create');
    Route::post('admin/menu/store', [MenuController::class, 'store'])->name('menu_store');
    Route::get('admin/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu_edit');
    Route::post('admin/menu/update', [MenuController::class, 'update'])->name('menu_update');
    Route::delete('admin/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menu_destroy');

    //Unit and subdomain
    Route::get('admin/unit_kerja', [UnitController::class, 'home'])->name('unit_kerja');
    Route::get('admin/unit_kerja/create', [UnitController::class, 'create'])->name('unit_kerja_create');
    Route::post('admin/unit_kerja/store}', [UnitController::class, 'store'])->name('unit_kerja_store');
    Route::delete('admin/unit_kerja/delete/{id}', [UnitController::class, 'destroy'])->name('unit_kerja_delete');
    Route::post('admin/unit_kerja/update', [UnitController::class, 'update'])->name('unit_kerja_update');
    Route::get('admin/unit_kerja/edit/{id}', [UnitController::class, 'edit'])->name('unit_kerja_edit');

    //users
    Route::get('admin/users', [UserController::class, 'home'])->name('users');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('users_create');
    Route::delete('admin/users/delete/{id}', [UserController::class, 'destroy'])->name('users_delete');
    Route::post('admin/users/update', [UserController::class, 'update'])->name('users_update');
    Route::post('admin/users/store', [UserController::class, 'store'])->name('users_store');
    Route::get('admin/users/edit/{id}', [UserController::class, 'edit'])->name('users_edit');

    Route::get('admin/users/password_edit/{id}', [UserController::class, 'password_edit'])->name('password_edit');
    Route::post('admin/users/password_update', [UserController::class, 'password_update'])->name('password_update');


    //berita
    Route::get('admin/list_berita', [BeritaController::class, 'list_berita'])->name('list_berita');
    Route::get('admin/berita/list_edit/{id}', [BeritaController::class, 'list_edit'])->name('list_berita_edit');
    Route::post('admin/berita/list_update', [BeritaController::class, 'list_update'])->name('list_berita_update');

    //front menu
    Route::get('admin/front', [MenuFrontController::class, 'home'])->name('front');
    Route::get('admin/front/create', [MenuFrontController::class, 'create'])->name('front_create');
    Route::post('admin/front/store', [MenuFrontController::class, 'store'])->name('front_store');
    Route::get('admin/front/edit/{id}', [MenuFrontController::class, 'edit'])->name('front_edit');
    Route::post('admin/front/update', [MenuFrontController::class, 'update'])->name('front_update');
    Route::delete('admin/front/delete/{id}', [MenuFrontController::class, 'destroy'])->name('front_destroy');


    //front menu detail
    Route::get('admin/front_detail', [MenuFrontDetailController::class, 'home'])->name('front_detail');
    Route::get('admin/front_detail/create', [MenuFrontDetailController::class, 'create'])->name('front_detail_create');
    Route::post('admin/front_detail/store', [MenuFrontDetailController::class, 'store'])->name('front_detail_store');
    Route::get('admin/front_detail/edit/{id}', [MenuFrontDetailController::class, 'edit'])->name('front_detail_edit');
    Route::post('admin/front_detail/update', [MenuFrontDetailController::class, 'update'])->name('front_detail_update');
    Route::delete('admin/front_detail/delete/{id}', [MenuFrontDetailController::class, 'destroy'])->name('front_detail_destroy');


});

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    //halaman
    Route::get('admin/halaman', [PagesController::class, 'home'])
    ->name('halaman');
    Route::get('admin/halaman/create', [PagesController::class, 'create'])
    ->name('halaman_create');
    Route::post('admin/halaman/store', [PagesController::class, 'store'])
    ->name('halaman_store');
    Route::delete('admin/halaman/delete/{id}', [PagesController::class, 'destroy'])
    ->name('halaman_delete');
    Route::post('admin/halaman/edit', [PagesController::class, 'update'])
    ->name('halaman_update');
    Route::get('admin/halaman/edit/{id}', [PagesController::class, 'edit'])
    ->name('halaman_edit');

     //Menu
     Route::get('admin/menu', [MenuController::class, 'home'])->name('menu');
     Route::get('admin/menu/create', [MenuController::class, 'create'])->name('menu_create');
     Route::post('admin/menu/store', [MenuController::class, 'store'])->name('menu_store');
     Route::get('admin/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu_edit');
     Route::post('admin/menu/update', [MenuController::class, 'update'])->name('menu_update');
     Route::delete('admin/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menu_destroy');


     //pengumuman
     Route::get('admin/pengumuman', [PengumumanController::class, 'home'])->name('pengumuman');
     Route::get('admin/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman_create');
     Route::post('admin/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman_store');
     Route::get('admin/pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->name('pengumuman_edit');
     Route::post('admin/pengumuman/update', [PengumumanController::class, 'update'])->name('pengumuman_update');
     Route::delete('admin/pengumuman/delete/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman_destroy');

    //category berita
    Route::get('admin/category', [CategoryController::class, 'home'])->name('category');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category_create');
    Route::post('admin/category/store', [CategoryController::class, 'store'])->name('category_store');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
    Route::post('admin/category/update', [CategoryController::class, 'update'])->name('category_update');
    Route::delete('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category_destroy');

     //berita
    Route::get('admin/berita', [BeritaController::class, 'home'])->name('berita');
    Route::get('admin/berita/create', [BeritaController::class, 'create'])->name('berita_create');
    Route::post('admin/berita/store', [BeritaController::class, 'store'])->name('berita_store');
    Route::get('admin/berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita_edit');
    Route::post('admin/berita/update', [BeritaController::class, 'update'])->name('berita_update');
    Route::delete('admin/berita/delete/{id}', [BeritaController::class, 'destroy'])->name('berita_destroy');

    //slide
    Route::get('admin/slide', [SlideController::class, 'home'])->name('slide');
    Route::get('admin/slide/create', [SlideController::class, 'create'])->name('slide_create');
    Route::post('admin/slide/store', [SlideController::class, 'store'])->name('slide_store');
    Route::get('admin/slide/edit/{id}', [SlideController::class, 'edit'])->name('slide_edit');
    Route::post('admin/slide/update', [SlideController::class, 'update'])->name('slide_update');
    Route::delete('admin/slide/delete/{id}', [SlideController::class, 'destroy'])->name('slide_destroy');

    //link
    Route::get('admin/link', [LinkController::class, 'home'])->name('link');
    Route::get('admin/link/create', [LinkController::class, 'create'])->name('link_create');
    Route::post('admin/link/store', [LinkController::class, 'store'])->name('link_store');
    Route::get('admin/link/edit/{id}', [LinkController::class, 'edit'])->name('link_edit');
    Route::post('admin/link/update', [LinkController::class, 'update'])->name('link_update');
    Route::delete('admin/link/delete/{id}', [LinkController::class, 'destroy'])->name('link_destroy');

    //aplikasi
    Route::get('admin/aplikasi', [AplikasiController::class, 'home'])->name('aplikasi');
    Route::get('admin/aplikasi/create', [AplikasiController::class, 'create'])->name('aplikasi_create');
    Route::post('admin/aplikasi/store', [AplikasiController::class, 'store'])->name('aplikasi_store');
    Route::get('admin/aplikasi/edit/{id}', [AplikasiController::class, 'edit'])->name('aplikasi_edit');
    Route::post('admin/aplikasi/update', [AplikasiController::class, 'update'])->name('aplikasi_update');
    Route::delete('admin/aplikasi/delete/{id}', [AplikasiController::class, 'destroy'])->name('aplikasi_destroy');

    //logo dan pimpinan
    Route::get('admin/pimpinan', [PimpinanController::class, 'home'])->name('pimpinan');
    Route::get('admin/pimpinan/create', [PimpinanController::class, 'create'])->name('pimpinan_create');
    Route::post('admin/pimpinan/store', [PimpinanController::class, 'store'])->name('pimpinan_store');
    Route::get('admin/pimpinan/edit/{id}', [PimpinanController::class, 'edit'])->name('pimpinan_edit');
    Route::post('admin/pimpinan/update', [PimpinanController::class, 'update'])->name('pimpinan_update');
    Route::delete('admin/pimpinan/delete/{id}', [PimpinanController::class, 'destroy'])->name('pimpinan_destroy');

    Route::get('admin/logo', [LogoController::class, 'home'])->name('logo');
    Route::get('admin/logo/create', [LogoController::class, 'create'])->name('logo_create');
    Route::post('admin/logo/store', [LogoController::class, 'store'])->name('logo_store');
    Route::get('admin/logo/edit/{id}', [LogoController::class, 'edit'])->name('logo_edit');
    Route::post('admin/logo/update', [LogoController::class, 'update'])->name('logo_update');
    Route::delete('admin/logo/delete/{id}', [LogoController::class, 'destroy'])->name('logo_destroy');

    //gallery
    Route::get('admin/gallery', [GalleryController::class, 'home'])->name('gallery');
    Route::get('admin/gallery/create', [GalleryController::class, 'create'])->name('gallery_create');
    Route::post('admin/gallery/store', [GalleryController::class, 'store'])->name('gallery_store');
    Route::get('admin/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery_edit');
    Route::post('admin/gallery/update', [GalleryController::class, 'update'])->name('gallery_update');
    Route::delete('admin/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery_destroy');

    //Paket
    Route::get('admin/paket', [PaketController::class, 'home'])->name('paket');
    Route::get('admin/paket/create', [PaketController::class, 'create'])->name('paket_create');
    Route::post('admin/paket/store', [PaketController::class, 'store'])->name('paket_store');
    Route::get('admin/paket/edit/{id}', [PaketController::class, 'edit'])->name('paket_edit');
    Route::post('admin/paket/update', [PaketController::class, 'update'])->name('paket_update');
    Route::delete('admin/paket/delete/{id}', [PaketController::class, 'destroy'])->name('paket_destroy');


    //infografis
    Route::get('admin/info', [InfoController::class, 'home'])->name('info');
    Route::get('admin/info/create', [InfoController::class, 'create'])->name('info_create');
    Route::post('admin/info/store', [InfoController::class, 'store'])->name('info_store');
    Route::get('admin/info/edit/{id}', [InfoController::class, 'edit'])->name('info_edit');
    Route::post('admin/info/update', [InfoController::class, 'update'])->name('info_update');
    Route::delete('admin/info/delete/{id}', [InfoController::class, 'destroy'])->name('info_destroy');

    //File
    Route::get('admin/file', [FileController::class, 'home'])->name('file');
    Route::get('admin/file/create', [FileController::class, 'create'])->name('file_create');
    Route::post('admin/file/store', [FileController::class, 'store'])->name('file_store');
    Route::get('admin/file/edit/{id}', [FileController::class, 'edit'])->name('file_edit');
    Route::post('admin/file/update', [FileController::class, 'update'])->name('file_update');
    Route::delete('admin/file/delete/{id}', [FileController::class, 'destroy'])->name('file_destroy');

    //alamat
    Route::get('admin/alamat', [AlamatController::class, 'home'])->name('alamat');
    Route::get('admin/alamat/create', [AlamatController::class, 'create'])->name('alamat_create');
    Route::post('admin/alamat/store', [AlamatController::class, 'store'])->name('alamat_store');
    Route::get('admin/alamat/edit/{id}', [AlamatController::class, 'edit'])->name('alamat_edit');
    Route::post('admin/alamat/update', [AlamatController::class, 'update'])->name('alamat_update');
    Route::delete('admin/alamat/delete/{id}', [AlamatController::class, 'destroy'])->name('alamat_destroy');

    //category ppid
    Route::get('admin/ppid_category', [PPIDCategoryController::class, 'home'])->name('ppid_category');

    //dokumen ppid
    Route::get('admin/ppid/dashboard', [PPIDDocumentController::class, 'dashboard'])->name('ppid_dashboard');

    Route::get('admin/ppid_dokumen', [PPIDDocumentController::class, 'home'])->name('ppid_dokumen');
    Route::get('admin/ppid_dokumen/create', [PPIDDocumentController::class, 'create'])->name('dokumen_create');
    Route::post('admin/ppid_dokumen/store', [PPIDDocumentController::class, 'store'])->name('dokumen_store');
    Route::get('admin/ppid_dokumen/edit/{id}', [PPIDDocumentController::class, 'edit'])->name('dokumen_edit');
    Route::post('admin/ppid_dokumen/update', [PPIDDocumentController::class, 'update'])->name('dokumen_update');
    Route::delete('admin/ppid_dokumen/delete/{id}', [PPIDDocumentController::class, 'destroy'])->name('dokumen_destroy');

    Route::get('admin/ppid/permohonan', [PpidPermohonanController::class, 'permohonan'])->name('permohonan');
    Route::get('admin/ppid/permohonan_terima', [PpidPermohonanController::class, 'permohonan_terima'])->name('permohonan_terima');
    Route::get('admin/ppid/permohonan_status/{id}', [PpidPermohonanController::class, 'permohonan_status'])->name('permohonan_status');

    // Route::get('admin/ppid/permohonan_selesai', [PpidPermohonanController::class, 'permohonan_selesai'])->name('permohonan_selesai');
    // Route::get('admin/ppid/permohonan_tolak', [PpidPermohonanController::class, 'permohonan_tolak'])->name('permohonan_tolak');

    Route::get('admin/ppid/permohonan_detail/{id}', [PpidPermohonanController::class, 'permohonan_detail'])->name('permohonan_detail');
    Route::delete('admin/ppid/permohonan_delete/{id}', [PpidPermohonanController::class, 'permohonan_delete'])->name('permohonan_delete');
    Route::post('admin/ppid/permohonan_update', [PpidPermohonanController::class, 'permohonan_update'])->name('permohonan_update');


    Route::get('admin/ppid/keberatan', [PpidPermohonanController::class, 'keberatan'])->name('keberatan');
    Route::get('admin/ppid/keberatan_terima', [PpidPermohonanController::class, 'permohonan_keberatan_terima'])->name('permohonan_keberatan_terima');
    Route::get('admin/ppid/keberatan_proses', [PpidPermohonanController::class, 'permohonan_keberatan_proses'])->name('permohonan_keberatan_proses');
    Route::get('admin/ppid/keberatan_selesai', [PpidPermohonanController::class, 'permohonan_keberatan_selesai'])->name('permohonan_keberatan_selesai');
    Route::get('admin/ppid/keberatan_tolak', [PpidPermohonanController::class, 'permohonan_keberatan_tolak'])->name('permohonan_keberatan_tolak');

    Route::get('admin/ppid/keberatan_detail/{id}', [PpidPermohonanController::class, 'keberatan_detail'])->name('permohonan_keberatan_detail');
    Route::get('admin/ppid/keberatan_delete/{id}', [PpidPermohonanController::class, 'keberatan_destroy'])->name('permohonan_keberatan_destroy');

    // Route::get('admin/ppid/keberatan', [PpidPermohonanController::class, 'keberatan'])->name('keberatan');

    //survey kepuasan masyarakat
    Route::get('admin/survey_dasboard', [SurveyController::class, 'dashboard'])->name('survey_dashboard');
    Route::get('admin/survey', [SurveyController::class, 'home'])->name('survey');
    Route::get('admin/survey/create', [SurveyController::class, 'create'])->name('survey_create');
    Route::post('admin/survey/store', [SurveyController::class, 'store'])->name('survey_store');
    Route::get('admin/survey/edit/{id}', [SurveyController::class, 'edit'])->name('survey_edit');
    Route::post('admin/survey/update', [SurveyController::class, 'update'])->name('survey_update');
    Route::delete('admin/survey/delete/{id}', [SurveyController::class, 'destroy'])->name('survey_destroy');


    // Route::get('admin/survey/edit/{id}', [SurveyController::class, 'edit'])->name('bppid_dokumen_edit');
    // Route::post('admin/survey/update', [SurveyController::class, 'update'])->name('ppid_dokumen_update');
    // Route::delete('admin/survey/delete/{id}', [SurveyController::class, 'destroy'])->name('berita_ppid_dokumen_destroy');




});

require __DIR__.'/auth.php';
