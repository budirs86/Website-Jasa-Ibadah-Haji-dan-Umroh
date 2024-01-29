<?php

namespace App\Http\Controllers;

use App\Models\PpidCategory;
use App\Models\PpidDocument;
use App\Models\Ppid_permohonan;
use App\Models\Ppid_keberatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PPIDDocumentController extends Controller
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
        $dokumen = PpidDocument::where('unit_id', $unit)
        ->with('category')
        ->with('unit')
        ->orderBy('id', 'DESC')->paginate(10);
        return view('admin.ppid_dokumen.dokumen', compact('dokumen'));
    }

    public function dashboard()
    {
        $unit = auth::user()->unit_id;
        $dokumen = PpidDocument::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->paginate(10);
        return view('admin.ppid.dashboard', compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit   = auth::user()->unit_id;
        $cat    = PpidCategory::orderBy('id', 'ASC')->get();
        return view('admin.ppid_dokumen.create', compact('cat'));
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
            'title' => 'required|max:500',
            'description' => 'required',
            'images' => 'required|mimes:pdf,doc,docx,xls,xlsx,zip|max:10000',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        //data
        $title          = $request->title;
        $slug           = Str::slug($title, '-');
        $description    = $request->description;
        $cat_id         = $request->cat_id;
        $unit           = auth::user()->unit_id;
        $user           = auth::user()->id;

        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $file_name = date('YmdHis').".$ext";
                    $upload_path = 'public/files';
                    $request->file('images')->move($upload_path, $file_name);
                }

            }

            PpidDocument::create([
                'title'         => $title,
                'description'    => $description,
                'file_name'     => $file_name,
                'slug'          => $slug,
                'category_id'   => $cat_id,
                'unit_id'       => $unit,
                'created_by'    => $user,
                'updated_by'    => $user,

            ]);
            return redirect()->route('ppid_dokumen')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('dokumen_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);

         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permohonan_detail(Request $request)
    {
        //detail permohonan

        $ppid_detail = Ppid_permohonan::find($request->id);
        return view('admin.ppid_dokumen.detail', compact('ppid_detail'));
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
        $dokumen = PpidDocument::find($id);
        $cat    = PpidCategory::orderBy('id', 'ASC')->get();
        return view('admin.ppid_dokumen.edit', compact('dokumen', 'cat'));
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
            'title' => 'required|max:500',
            'description' => 'required',

        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        //data
        $id             = $request->id;
        $title          = $request->title;
        $slug           = Str::slug($title, '-');
        $description    = $request->description;
        $cat_id         = $request->cat_id;
        $unit           = auth::user()->unit_id;
        $user           = auth::user()->id;

        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $file_name = date('YmdHis').".$ext";
                    $upload_path = 'public/files';
                    $request->file('images')->move($upload_path, $file_name);
                }

                $dokumen = PpidDocument::find($id);
                $dokumen->update([
                    'title'         => $title,
                    'description'    => $description,
                    'file_name'     => $file_name,
                    'slug'          => $slug,
                    'category_id'   => $cat_id,
                    'updated_by'    => $user,

                ]);

            }else{

                $dokumen = PpidDocument::find($id);
                $dokumen->update([
                    'title'         => $title,
                    'description'    => $description,
                    'slug'          => $slug,
                    'category_id'   => $cat_id,
                    'updated_by'    => $user,

                ]);

            }


            return redirect()->route('ppid_dokumen')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                dd($e);
                return redirect()->route('dokumen_edit', $id)->with(['' => 'Data Tidak Berhasil Disimpan!']);

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
        $dok = PpidDocument::find($id);
        $file_name = $dok->file_name;
        $dok->delete();
        //remove file
        File::delete('public/files/'.$file_name);
        return redirect()->route('ppid_dokumen')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function permohonan(Request $request)
    {
        // $unit = auth::user()->unit_id;
        // $permohonan = Ppid_permohonan::where('unit_id', $unit)
        // ->orderBy('id', 'DESC')->paginate(10);
        // return view('admin.ppid.permohonan', compact('permohonan'));
    }

    public function permohonan_terima(Request $request)
    {
        // $unit = auth::user()->unit_id;
        // $permohonan = PpidDocument::where('unit_id', $unit)
        // ->orderBy('id', 'DESC')->paginate(10);
        // return view('admin.ppid.permohonan_terima', compact('permohonan'));
    }

    public function permohonan_proses(Request $request)
    {
        // $unit = auth::user()->unit_id;
        // $permohonan = PpidDocument::where('unit_id', $unit)
        // ->orderBy('id', 'DESC')->paginate(10);
        // return view('admin.ppid.permohonan_proses', compact('permohonan'));
    }

    public function permohonan_selesai(Request $request)
    {
        // $unit = auth::user()->unit_id;
        // $permohonan = PpidDocument::where('unit_id', $unit)
        // ->orderBy('id', 'DESC')->paginate(10);
        // return view('admin.ppid.permohonan_selesai', compact('permohonan'));
    }

    public function permohonan_tolak(Request $request)
    {
        // $unit = auth::user()->unit_id;
        // $permohonan = PpidDocument::where('unit_id', $unit)
        // ->orderBy('id', 'DESC')->paginate(10);
        // return view('admin.ppid.permohonan_tolak', compact('permohonan'));
    }

    public function permohonan_destroy($id)
    {
        // $dok = Ppid_permohonan::find($id);
        // $file_name = $dok->file_name;
        // $dok->delete();
        // //remove file
        // File::delete('public/files/'.$file_name);
        // return redirect()->route('permohonan_destroy')->with(['success' => 'Data Berhasil Dihapus!']);
    }


    public function keberatan(Request $request)
    {
        // $unit = auth::user()->unit_id;
        // $keberatan = Ppid_keberatan::where('unit_id', $unit)
        // ->orderBy('id', 'DESC')->paginate(10);
        // return view('admin.ppid.keberatan', compact('keberatan'));
    }

    public function keberatan_destroy($id)
    {
        // $dok = Ppid_keberatan::find($id);
        // $file_name = $dok->file_name;
        // $dok->delete();
        // //remove file
        // File::delete('public/files/'.$file_name);
        // return redirect()->route('dokumen_keberatan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
