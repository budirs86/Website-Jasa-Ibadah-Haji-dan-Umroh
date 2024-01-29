<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Resources\MenuResource;

class MenuController extends Controller
{
    
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $menu = Menu::where('unit_id', $id)->where('parent_id', 0)
        ->orderBy('sort')->get();
        //return collection of posts as a resource
        return new MenuResource(true, 'List Menu', $menu);
    }
}
