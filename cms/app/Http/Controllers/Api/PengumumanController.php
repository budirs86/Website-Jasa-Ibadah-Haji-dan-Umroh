<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Resources\PengumumanResource;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $pengumuman = Pengumuman::where('unit_id', $id)->orderBy('id', 'DESC')->get();
        //return collection of posts as a resource
        return new PengumumanResource(true, 'List Pengumuman', $pengumuman);
    }
}
