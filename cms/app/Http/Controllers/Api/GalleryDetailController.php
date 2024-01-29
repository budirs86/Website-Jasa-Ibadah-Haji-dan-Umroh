<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Resources\GalleryDetailResource;

class GalleryDetailController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $gallery = Gallery::where('unit_id', $id)->where('id', $request->id)
        ->orderBy('id', 'DESC')->take(20)->get();
        //return collection of posts as a resource

        return new GalleryDetailResource(true, 'Detail Gallery', $gallery);
    }

}
