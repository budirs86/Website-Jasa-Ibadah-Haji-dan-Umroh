<?php

namespace App\Http\Controllers;

use App\Models\InfoGrafis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class InfoController extends Controller
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
        $info = InfoGrafis::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->get();
        return view('admin.info.info', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = auth::user()->unit_id;
        return view('admin.info.create');
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
            'description' => 'required',
            
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $decription = $request->description;
        $slug       = Str::slug($title, '-');
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
     
        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/info';
                    $request->file('images')->move($upload_path, $image_name);
                }

            }

            InfoGrafis::create([
                'title'         => $title,
                'slug'          => $slug,
                'pic'           => $image_name,
                'description'   => $decription,
                'unit_id'       => $unit,
                'created_by'   => $user,
                'updated_by'    => $user,

            ]);
            return redirect()->route('info')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){     
      
                return redirect()->route('info_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
        $info = InfoGrafis::find($id);
        return view('admin.info.edit', compact('info'));
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
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $decription = $request->description;
        $slug       = Str::slug($title, '-');
        $user       = auth::user()->id;

        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/info';
                    $request->file('images')->move($upload_path, $image_name);
                }
                $info = InfoGrafis::where('id', $request->id)->first();
                $info->update([
                    'title'         => $title,
                    'slug'          => Str::slug($title, '-'),
                    'pic'           => $image_name,
                    'description'   => $decription,
                    'updated_by'    => $user,
    
                ]);
            }else{
                $info = InfoGrafis::where('id', $request->id)->first();
                $info->update([
                    'title'         => $title,
                    'description'   => $decription,
                    'slug'          => Str::slug($title, '-'),
                    'updated_by'    => $user,
    
                ]);
            }

           
            return redirect()->route('info')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('info_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $file = InfoGrafis::find($id);
        $file_name = $file->pic;
        $file->delete();
        //remove file
        File::delete('public/images/info/'.$file_name);
        return redirect()->route('info')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
