<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $category = Category::where('unit_id', $id)->get();
        //return collection of posts as a resource
        return new CategoryResource(true, 'List Kategory', $category);
    }
}
