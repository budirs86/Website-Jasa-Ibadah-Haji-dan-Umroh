<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PaketController extends Controller
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
        $paket = Paket::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->get();
        return view('admin.paket.paket', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = auth::user()->unit_id;
        return view('admin.paket.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'harga' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $decription = $request->description;
        $harga = $request->harga;
        $slug       = Str::slug($title, '-');
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;

        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/paket';
                    $request->file('images')->move($upload_path, $image_name);
                }

            }

            Paket::create([
                'title'         => $title,
                'slug'          => $slug,
                'pic'           => $image_name,
                'description'   => $decription,
                'price'         => $harga,
                'unit_id'       => $unit,
                'created_by'   => $user,
                'updated_by'    => $user,

            ]);
            return redirect()->route('paket')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){

                return redirect()->route('paket_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);

         }
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
        $Paket = Paket::find($id);
        return view('admin.paket.edit', compact('paket'));
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
            'description' => 'required',
            'harga' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $decription = $request->description;
        $harga      = $request->harga;
        $slug       = Str::slug($title, '-');
        $user       = auth::user()->id;

        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/paket';
                    $request->file('images')->move($upload_path, $image_name);
                }
                $paket = Paket::where('id', $request->id)->first();
                $paket->update([
                    'title'         => $title,
                    'slug'          => Str::slug($title, '-'),
                    'pic'           => $image_name,
                    'description'   => $decription,
                    'price'         => $harga,

                    'updated_by'    => $user,

                ]);
            }else{
                $Paket = Paket::where('id', $request->id)->first();
                $Paket->update([
                    'title'         => $title,
                    'description'   => $decription,
                    'price'         => $harga,
                    'slug'          => Str::slug($title, '-'),
                    'updated_by'    => $user,

                ]);
            }


            return redirect()->route('paket')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('paket_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $file = Paket::find($id);
        $file_name = $file->pic;
        $file->delete();
        //remove file
        File::delete('public/images/paket/'.$file_name);
        return redirect()->route('paket')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
