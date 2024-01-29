<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PpidDocumentResource;
use App\Models\Ppid_permohonan;
use App\Models\PpidDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PpidDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //get posts

        // $products = $art->products->skip(0)->take(10)->get(); //get first 10 rows
        // $products = $art->products->skip(10)->take(10)->get(); //get next 10 rows

        $cat = $request->id;
        if ($cat){
        $dok = PpidDocument::where('category_id', $cat)->orderBy('id', 'DESC')
                ->with('category')
                ->with('unit')
                ->take(100)->get();
        }else{
            $dok = PpidDocument::orderBy('id', 'DESC')
                ->with('category')
                ->with('unit')
                ->take(100)->get();
        }

        return new PpidDocumentResource(true, 'Dokumen PPID', $dok);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
