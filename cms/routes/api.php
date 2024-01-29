<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//public route
Route::apiResource('/menu', App\Http\Controllers\Api\MenuController::class);
Route::apiResource('/menu_detail', App\Http\Controllers\Api\MenuDetailController::class);

Route::apiResource('/front_menu', App\Http\Controllers\Api\MenuFrontController::class);
Route::apiResource('/front_menu_detail', App\Http\Controllers\Api\MenuFrontDetailController::class);



Route::apiResource('/berita', App\Http\Controllers\Api\BeritaController::class);
Route::apiResource('/berita_category', App\Http\Controllers\Api\BeritaCategoryController::class);

Route::apiResource('/berita_detail', App\Http\Controllers\Api\BeritaDetailController::class);
Route::apiResource('/top_news', App\Http\Controllers\Api\TopNewsController::class);


Route::apiResource('/slide', App\Http\Controllers\Api\SlideController::class);
Route::apiResource('/aplikasi', App\Http\Controllers\Api\AplikasiController::class);

Route::apiResource('/pengumuman', App\Http\Controllers\Api\PengumumanController::class);
Route::apiResource('/pengumuman_detail', App\Http\Controllers\Api\PengumumanDetailController::class);

Route::apiResource('/file', App\Http\Controllers\Api\FileController::class);

Route::apiResource('/link', App\Http\Controllers\Api\LinkController::class);

Route::apiResource('/category', App\Http\Controllers\Api\CategoryController::class);

Route::apiResource('/halaman', App\Http\Controllers\Api\HalamanController::class);
Route::apiResource('/halaman_detail', App\Http\Controllers\Api\HalamanDetailController::class);

Route::apiResource('/pimpinan', App\Http\Controllers\Api\PimpinanController::class);
Route::apiResource('/logo', App\Http\Controllers\Api\LogoController::class);
Route::apiResource('/alamat', App\Http\Controllers\Api\AlamatController::class);

Route::apiResource('/gallery', App\Http\Controllers\Api\GalleryController::class);
Route::apiResource('/gallery_detail', App\Http\Controllers\Api\GalleryDetailController::class);

Route::apiResource('/infografis', App\Http\Controllers\Api\InfoGrafisController::class);

Route::apiResource('/ppid_document', App\Http\Controllers\Api\PpidDocumentController::class);

Route::apiResource('/ppid_permohonan', App\Http\Controllers\Api\PpidPermohonanController::class);

Route::apiResource('/ppid_keberatan', App\Http\Controllers\Api\PpidKeberatanController::class);


