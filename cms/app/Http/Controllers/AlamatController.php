<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AlamatController extends Controller
{
    public function home()
    {
        $unit = auth::user()->unit_id;
        $alamat = Alamat::where('unit_id', $unit)->get();
        return view('admin.alamat.alamat', compact('alamat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alamat.create');
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
            'alamat' => 'required|max:255',
            'email' => ['string', 'email'],
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $alamat         = $request->alamat;
        $kota           = $request->kota;
        $provinsi       = $request->provinsi;
        $kode_pos       = $request->kode_pos;
        $email          = $request->email;
        $telepon        = $request->telepon;
        $fax            = $request->fax;
        
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
     
        try{
            Alamat::create([
                'alamat'        => $alamat,
                'kota'          => $kota,
                'provinsi'      => $provinsi,
                'kode_pos'      => $kode_pos,
                'email'         => $email,
                'telepon'       => $telepon,
                'fax'           => $fax,
                'unit_id'       => $unit,
                'created_by'    => $user,
                'updated_by'    => $user,
            ]);
            return redirect()->route('alamat')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){  
                dd($e);             
                return redirect()->route('alamat_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
        $alamat = Alamat::find($id);
        return view('admin.alamat.edit', compact('alamat'));
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
            'alamat' => 'required|max:255',
            'email' => ['string', 'email'],
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $alamat         = $request->alamat;
        $kota           = $request->kota;
        $provinsi       = $request->provinsi;
        $kode_pos       = $request->kode_pos;
        $email          = $request->email;
        $telepon        = $request->telepon;
        $fax            = $request->fax;
        
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
  
        try{
        $Alamat = Alamat::where('id', $request->id)->first();
        $Alamat->update([
            'alamat'        => $alamat,
            'kota'          => $kota,
            'provinsi'      => $provinsi,
            'kode_pos'      => $kode_pos,
            'email'         => $email,
            'telepon'       => $telepon,
            'fax'           => $fax,
            'unit_id'       => $unit,
            'created_by'    => $user,
            'updated_by'    => $user,
        ]);
            

           
            return redirect()->route('alamat')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('alamat')->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $alamat = Alamat::find($id);
        $alamat->delete();
        return redirect()->route('alamat')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
