<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Files;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Session\Session;

class FileController extends Controller
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
        $file = Files::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->get();
        return view('admin.file.file', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = auth::user()->unit_id;
        return view('admin.file.create');
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
            'images' => 'required|mimes:pdf,doc,docx,xls,xlsx,zip|max:10000',
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
                    $upload_path = 'public/files';
                    $request->file('images')->move($upload_path, $image_name);
                }

            }

            Files::create([
                'title'         => $title,
                'file_name'     => $image_name,
                'unit_id'       => $unit,
                'created_by'    => $user,
                'updated_by'    => $user,

            ]);
            return redirect()->route('file')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('file_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);

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
        $file = Files::find($id);
        return view('admin.file.edit', compact('file'));
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
        $user       = auth::user()->id;

        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/files';
                    $request->file('images')->move($upload_path, $image_name);
                }
                $file = Files::where('id', $request->id)->first();
                $file->update([
                    'title'         => $title,
                    'file_name'           => $image_name,
                    'updated_by'    => $user,

                ]);
            }else{
                $file = Files::where('id', $request->id)->first();
                $file->update([
                    'title'         => $title,
                    'updated_by'    => $user,

                ]);
            }


            return redirect()->route('file')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('file_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $file = Files::find($id);
        $file_name = $file->file_name;
        $file->delete();
        //remove file
        File::delete('public/files/'.$file_name);
        return redirect()->route('file')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
