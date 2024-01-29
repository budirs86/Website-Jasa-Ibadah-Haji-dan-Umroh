<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuFront;
use App\Http\Resources\MenuFrontResource;

class MenuFrontController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $menu = MenuFront::where('unit_id', $id)->orderBy('sort')->get();
        //return collection of posts as a resource
        return new MenuFrontResource(true, 'List Front Menu', $menu);
    }
}
