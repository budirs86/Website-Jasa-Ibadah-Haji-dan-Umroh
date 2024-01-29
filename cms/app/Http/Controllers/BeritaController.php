<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
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
        $news = Berita::where('unit_id', $unit)
        ->with('category')
        ->with('penulis')
        ->orderBy('id', 'DESC')->paginate(10);
        return view('admin.berita.berita', compact('news'));
    }

    public function list_berita()
    {
        $unit = auth::user()->unit_id;
        $news = Berita::where('show', 1)
        ->with('category')
        ->with('penulis')
        ->with('unit')
        ->where('show', 1)
        ->orderBy('id', 'DESC')
        ->paginate(10);


        return view('admin.berita.list_berita', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = auth::user()->unit_id;
        $category = Category::where('unit_id', $unit)->get();
        return view('admin.berita.create', compact('category'));
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
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $content    = $request->content;
        $category   = $request->category_id;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;

        if ((auth::user()->type == 'manager') OR (auth::user()->type == 'admin')){
            $status     = $request->status;
        }else{
            $status     = 0 ;
        }

        if ((auth::user()->type == 'manager')){
            $portal     = $request->portal;
        }else{
            $portal     = 0 ;
        }

        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/berita';
                    $request->file('images')->move($upload_path, $image_name);
                }

            }

            Berita::create([
                'title'         => $title,
                'content'       => $content,
                'slug'          => Str::slug($title, '-'),
                'pic'           => $image_name,
                'show'          => $status,
                'portal'        => $portal,
                'category_id'   => $category,
                'unit_id'       => $unit,
                'created_by'   => $user,
                'updated_by'    => $user,

            ]);
            return redirect()->route('berita')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('berita_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);

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
        $category = Category::where('unit_id', $unit)->get();
        $berita = Berita::where('id', $id )->first();
        return view('admin.berita.edit', compact('category', 'berita'));
    }

    public function list_edit(Request $request)
    {
        $unit = auth::user()->unit_id;
        $id = $request->id;
        $berita = Berita::where('id', $id )->with('category')->with('unit')->first();
        return view('admin.berita.list_edit', compact('berita'));
    }

    public function list_update(Request $request)
    {
        //data
        $user       = auth::user()->id;
        $status   = $request->status;

        try{
            $berita = Berita::where('id', $request->id)->first();
            $berita->update([
                'portal'        => $status,
                'updated_by'    => $user,
            ]);
            return redirect()->route('list_berita')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('list_berita_edit', $request->id)->with(['' => 'Data Tidak Berhasil Disimpan!']);

         }
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
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $content    = $request->content;
        $category   = $request->category_id;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;

        if ((auth::user()->type == 'manager') OR (auth::user()->type == 'admin')){
            $status     = $request->status;
        }else{
            $status     = 0 ;
        }

        if ((auth::user()->type == 'manager')){
            $portal     = $request->portal;
        }else{
            $portal     = 0 ;
        }

        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/berita';
                    $request->file('images')->move($upload_path, $image_name);
                }
                $berita = Berita::where('id', $request->id)->first();
                $berita->update([
                    'title'         => $title,
                    'content'       => $content,
                    'slug'          => Str::slug($title, '-'),
                    'pic'           => $image_name,
                    'show'          => $status,
                    'portal'        => $portal,
                    'category_id'   => $category,
                    'updated_by'    => $user,

                ]);
            }else{
                $berita = Berita::where('id', $request->id)->first();
                $berita->update([
                    'title'         => $title,
                    'content'       => $content,
                    'slug'          => Str::slug($title, '-'),
                    'show'          => $status,
                    'portal'        => $portal,
                    'category_id'   => $category,
                    'updated_by'    => $user,

                ]);
            }


            return redirect()->route('berita')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('berita')->with(['' => 'Data Tidak Berhasil Disimpan!']);

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
        $file = Berita::find($id);
        $file_name = $file->pic;
        $file->delete();
        //remove file
        File::delete('public/images/berita/'.$file_name);
        return redirect()->route('berita')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
