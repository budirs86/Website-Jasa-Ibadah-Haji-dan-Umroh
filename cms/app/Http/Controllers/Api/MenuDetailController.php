<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Resources\MenuDetailResource;

class MenuDetailController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->parent_id;
        $unit_id = $request->unit_id;

        //get posts
        $menu = Menu::where('unit_id', $unit_id)->where('parent_id', $id)
        ->orderBy('sort')->get();
        //return collection of posts as a resource
        return new MenuDetailResource(true, 'List Sub Menu', $menu);
    }
}
