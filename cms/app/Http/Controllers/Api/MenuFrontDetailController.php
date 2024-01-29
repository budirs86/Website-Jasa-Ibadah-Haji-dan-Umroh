<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuFrontDetail;
use Illuminate\Http\Request;
use App\Http\Resources\MenuFrontDetailResource;


class MenuFrontDetailController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->menu_id;

        //get posts
        $menu = MenuFrontDetail::where('menu_id', $id)->orderBy('sort')->get();
        //return collection of posts as a resource
        return new MenuFrontDetailResource(true, 'List Front Menu Detail', $menu);
    }
}
