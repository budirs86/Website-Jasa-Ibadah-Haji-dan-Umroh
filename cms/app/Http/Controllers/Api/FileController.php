<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Files;
use App\Http\Resources\FileResource;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $file = Files::where('unit_id', $id)->get();
        //return collection of posts as a resource
        return new FileResource(true, 'List File', $file);
    }
}
