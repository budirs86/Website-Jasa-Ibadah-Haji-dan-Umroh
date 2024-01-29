<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use App\Http\Resources\LogoResource;

class LogoController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $logo = Logo::where('unit_id', $id)->orderBy('id')->take(1)->get();

        //return collection of posts as a resource
   
        return new LogoResource(true, 'Unit Logo', $logo);
    }
}
