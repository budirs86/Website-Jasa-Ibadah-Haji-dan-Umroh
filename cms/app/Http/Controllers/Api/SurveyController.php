<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->unit_id;

        //get posts
        $berita = Berita::where('unit_id', $id)
        ->with('unit')->with('penulis')->with('category')
        ->orderBy('id', 'DESC')->take(4)->get();
        //return collection of posts as a resource

        return new TopNewsResource(true, 'Top News', $berita);
    }

}
