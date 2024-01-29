<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HalamanResource;
use Illuminate\Http\Request;
use App\Models\Pages;

class HalamanController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;
        $pages_id = $request->id;
        //get posts
        $halaman = Pages::where('unit_id', $id)->where('id', $pages_id)->get();
        //return collection of posts as a resource
        return new HalamanResource(true, 'List Link', $halaman);
    }
}
