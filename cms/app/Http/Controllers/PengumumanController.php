<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PengumumanController extends Controller
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
        $unit = auth::user()->unit_id;
        $pengumuman = Pengumuman::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->get();
        return view('admin.pengumuman.pengumuman', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = auth::user()->unit_id;
        return view('admin.pengumuman.create');
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
            'content' => 'required',
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
            Pengumuman::create([
                'title'         => $title,
                'content'       => $content,
                'slug'          => $slug,
                'unit_id'       => $unit,
                'created_by'   => $user,
                'updated_by'    => $user,
            ]);
            return redirect()->route('pengumuman')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                // dd($e);
                return redirect()->route('pengumuman_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
         }
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
        $unit = auth::user()->unit_id;
        // $id = $request->id;
        $pengumuman = Pengumuman::find($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
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
            'content' => 'required',
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
            $pengumuman = Pengumuman::find($request->id);
            $pengumuman->update([
                'title'         => $title,
                'content'       => $content,
                'slug'          => $slug,
                'updated_by'    => $user,
            ]);
            return redirect()->route('pengumuman')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('pengumuman')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();
        return redirect()->route('pengumuman')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
