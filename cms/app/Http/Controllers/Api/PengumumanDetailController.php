<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Http\Resources\PengumumanDetailResource;

class PengumumanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $pengumuman = Pengumuman::where('unit_id', $id)->where('id', $request->id)->get();
        //return collection of posts as a resource
        return new PengumumanDetailResource(true, 'Detail Pengumuman', $pengumuman);
    }

}
