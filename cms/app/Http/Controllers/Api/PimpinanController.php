<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PimpinanResource;
use App\Models\Pimpinan;
use Illuminate\Http\Request;

class PimpinanController extends Controller
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
        $pimpinan = Pimpinan::where('unit_id', $id)->get();
        //return collection of posts as a resource

        return new PimpinanResource(true, 'Pimpinan SKPD', $pimpinan);
    }

    
}
