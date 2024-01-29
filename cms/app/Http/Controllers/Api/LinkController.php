<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Resources\LinkResource;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $link = Link::where('unit_id', $id)->get();
        //return collection of posts as a resource
        return new LinkResource(true, 'List Link', $link);
    }
}
