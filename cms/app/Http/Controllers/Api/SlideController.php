<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SlideResource;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $slide = Slide::where('unit_id', $id)->get();
        //return collection of posts as a resource
        return new SlideResource(true, 'List Slide', $slide);
    }
}
