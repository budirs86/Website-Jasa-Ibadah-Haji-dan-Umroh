<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $unit = auth::user()->unit_id;
        $aplikasi = Aplikasi::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->get();
        return view('admin.aplikasi.aplikasi', compact('aplikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aplikasi.create');
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
            'keterangan' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'link'  =>'required',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $keterangan = $request->keterangan;
        $link       = $request->link;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
     
        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/aplikasi';
                    $request->file('images')->move($upload_path, $image_name);
                }

            }

            Aplikasi::create([
                'title'         => $title,
                'description'   => $keterangan,
                'pic'           => $image_name,
                'link'          => $link,
                'unit_id'       => $unit,
                'created_by'   => $user,
                'updated_by'    => $user,
                'slug'          => Str::slug($title, '-'),

            ]);
            return redirect()->route('aplikasi')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){  
                dd($e);             
                return redirect()->route('aplikasi_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $unit = auth::user()->unit_id;
        $id = $request->id;
        $aplikasi = Aplikasi::find($id);
        return view('admin.aplikasi.edit', compact('aplikasi'));
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
            'keterangan' => 'required',
            'link'  =>'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $keterangan = $request->keterangan;
        $link       = $request->link;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
  
        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/aplikasi';
                    $request->file('images')->move($upload_path, $image_name);
                }
                $aplikasi = Aplikasi::where('id', $request->id)->first();
                $aplikasi->update([
                    'title'         => $title,
                    'description'   => $keterangan,
                    'slug'          => Str::slug($title, '-'),
                    'pic'           => $image_name,
                    'updated_by'    => $user,
                    'link'          => $link,    
                ]);
            }else{
                $aplikasi = Aplikasi::where('id', $request->id)->first();
                $aplikasi->update([
                    'title'         => $title,
                    'description'   => $keterangan,
                    'slug'          => Str::slug($title, '-'),
                    'updated_by'    => $user,
                    'link'          => $link,
                ]);
            }

           
            return redirect()->route('aplikasi')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('aplikasi')->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $aplikasi = Aplikasi::find($id);
        $aplikasi->delete();
        return redirect()->route('aplikasi')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
