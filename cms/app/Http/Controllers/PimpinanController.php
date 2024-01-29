<?php

namespace App\Http\Controllers;

use App\Models\Pimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Pages;


class PimpinanController extends Controller
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
        $pimpinan = Pimpinan::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->get();
        return view('admin.pimpinan.pimpinan', compact('pimpinan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = auth::user()->unit_id;
        $pages = Pages::where('unit_id', $unit)->orderBy('id', 'DESC')->get();
        return view('admin.pimpinan.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Respo nnse
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'masa_jabatan' => 'required|max:255',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $nama          = $request->nama;
        $jabatan       = $request->jabatan;
        $masa_jabatan  = $request->masa_jabatan;
        $aktif         = $request->aktif;
        $link          = $request->sambutan;
        $unit          = auth::user()->unit_id;
        $user          = auth::user()->id;
    
        try{
            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/pimpinan';
                    $request->file('images')->move($upload_path, $image_name);
                }

            }
            Pimpinan::create([
                'nama_pimpinan'     => $nama,
                'nama_jabatan'      => $jabatan,
                'masa_jabatan'      => $masa_jabatan,
                'pic'               => $image_name,
                'active'       => $aktif,
                'unit_id'           => $unit,
                'created_by'        => $user,
                'updated_by'        => $user,
                'link'              => $link,
            ]);
            return redirect()->route('pimpinan')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('pimpinan_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
    public function edit(Request $request)
    {
        $unit = auth::user()->unit_id;
        $id = $request->id;
        $pimpinan = Pimpinan::find($id);
        $pages = Pages::where('unit_id', $unit)->orderBy('id', 'DESC')->get();
        return view('admin.pimpinan.edit', compact('pimpinan', 'pages'));
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
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'masa_jabatan' => 'required|max:255',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $nama          = $request->nama;
        $jabatan       = $request->jabatan;
        $masa_jabatan  = $request->masa_jabatan;
        $aktif         = $request->aktif;
        $link          = $request->sambutan;
        $unit          = auth::user()->unit_id;
        $user          = auth::user()->id;
    

        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/pimpinan';
                    $request->file('images')->move($upload_path, $image_name);
                }
                $pimpinan = Pimpinan::where('id', $request->id)->first();
                $pimpinan->update([
                    'nama_pimpinan'     => $nama,
                    'nama_jabatan'      => $jabatan,
                    'masa_jabatan'      => $masa_jabatan,
                    'pic'               => $image_name,
                    'active'       => $aktif,
                    'updated_by'        => $user,
                    'link'              => $link,
    
                ]);
            }else{
                $pimpinan = Pimpinan::where('id', $request->id)->first();
                $pimpinan->update([
                    'nama_pimpinan'     => $nama,
                    'nama_jabatan'      => $jabatan,
                    'masa_jabatan'      => $masa_jabatan,
                    'active'            => $aktif,
                    'updated_by'        => $user,
                    'link'              => $link,
                    

    
                ]);
            }

           
            return redirect()->route('pimpinan')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('pimpinan')->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $pimpinan = Pimpinan::find($id);
        $pimpinan->delete();
        return redirect()->route('pimpinan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
