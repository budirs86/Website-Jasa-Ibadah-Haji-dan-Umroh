<?php

namespace App\Http\Controllers;

use App\Models\Ppid_keberatan;
use App\Models\Ppid_permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PpidPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function permohonan()
    {
        $unit = auth::user()->unit_id;
        $permohonan = Ppid_permohonan::where('unit_id', $unit)
        ->with('unit')
        ->orderBy('id', 'DESC')->paginate(10);
        return view('admin.ppid.permohonan', compact('permohonan'));
    }

    public function permohonan_detail(Request $request)
    {
        $unit = auth::user()->unit_id;
        $permohonan = Ppid_permohonan::find($request->id);
        return view('admin.ppid.permohonan_detail', compact('permohonan'));
    }

    public function permohonan_status(Request $request)
    {
        $unit = auth::user()->unit_id;
        $permohonan = Ppid_permohonan::find($request->id);
        return view('admin.ppid.permohonan_status', compact('permohonan'));
    }

    public function permohonan_update(Request $request)
    {
        $dokumen = Ppid_permohonan::find($request->id);

        $dokumen->update([
            'status' => $request->status_permohonan,
            'keterangan' => $request->keterangan,
            'updated_at' => $request->keterangan,


        ]);
        return redirect()->route('permohonan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function permohonan_delete(Request $request)
    {
        $dokumen = Ppid_permohonan::find($request->id);

        $dokumen->delete;

        return redirect()->route('permohonan')->with(['success' => 'Data Berhasil Dihapus!']);
    }



    public function keberatan()
    {
        $unit = auth::user()->unit_id;
        $permohonan = Ppid_keberatan::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->paginate(10);
        return view('admin.ppid.keberatan', compact('keberatan'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
