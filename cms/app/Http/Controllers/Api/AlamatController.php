<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;
use App\Http\Resources\AlamatResource;

class AlamatController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $alamat = Alamat::where('unit_id', $id)->orderBy('id')->take(1)->get();

        //return collection of posts as a resource
   
        return new AlamatResource(true, 'Unit Alamat', $alamat);
    }
}
