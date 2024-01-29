<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Slide;

class SlideController extends Controller
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
        $slide = Slide::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->get();
        return view('admin.slide.slide', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = auth::user()->unit_id;
        return view('admin.slide.create');
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
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
     
        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/slide';
                    $request->file('images')->move($upload_path, $image_name);
                }

            }

            Slide::create([
                'title'         => $title,
                'slug'          => Str::slug($title, '-'),
                'pic'           => $image_name,
                'link'          => '#',
                'unit_id'       => $unit,
                'created_by'   => $user,
                'updated_by'    => $user,

            ]);
            return redirect()->route('slide')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){               
                return redirect()->route('slide_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
        $slide = Slide::find($id);
        return view('admin.slide.edit', compact('slide'));
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
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
  
        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/slide';
                    $request->file('images')->move($upload_path, $image_name);
                }
                $slide = Slide::where('id', $request->id)->first();
                $slide->update([
                    'title'         => $title,
                    'slug'          => Str::slug($title, '-'),
                    'pic'           => $image_name,
                    'updated_by'    => $user,
    
                ]);
            }else{
                $slide = Slide::where('id', $request->id)->first();
                $slide->update([
                    'title'         => $title,
                    'slug'          => Str::slug($title, '-'),
                    'updated_by'    => $user,
    
                ]);
            }

           
            return redirect()->route('slide')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('slide')->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->route('slide')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
