<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pages;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        if ((auth::user()->type) === 'manager')
        {
            $pages = DB::table('pages')->orderBy('id', 'DESC')->paginate(15);
        }else{
            $unit = auth::user()->unit_id;
            $pages = Pages::where('unit_id', $unit)->orderBy('id', 'DESC')->paginate(15);
        }
        
        return view('admin.halaman.halaman', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::where('id', auth::user()->unit_id)->get();     
        return view('admin.halaman.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $slug       = Str::slug($title, '-');
        $content    = $request->content;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
    
        try{
            Pages::create([
                'title'         => $title,
                'content'       => $content,
                'slug'          => $slug,
                'unit_id'       => $unit,
                'created_by'   => $user,
                'updated_by'    => $user,
            ]);
            return redirect()->route('halaman')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('halaman_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $unit = auth::user()->unit_id;
        $pages = Pages::where('id', $request->id)
        ->where('unit_id', $unit)->first();
        return view('admin.halaman.edit', compact('pages', 'unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $slug       = Str::slug($title, '-');
        $content    = $request->content;
        $user       = auth::user()->id;
    
        try{
            $pages = Pages::find($request->id);
            $pages->update([
                'title'         => $title,
                'content'       => $content,
                'slug'          => $slug,
                'updated_by'    => $user,
            ]);
            return redirect()->route('halaman')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('halaman_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $halaman=Pages::find($id);
        $halaman->delete();
        return redirect()->route('halaman')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
