<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aplikasi;
use Illuminate\Http\Request;
use App\Http\Resources\AplikasiResource;

class AplikasiController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $aplikasi = Aplikasi::where('unit_id', $id)->get();
        //return collection of posts as a resource
        return new AplikasiResource(true, 'List Aplikasi', $aplikasi);
    }
}
