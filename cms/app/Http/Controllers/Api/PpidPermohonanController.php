<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ppid_permohonan;
use App\Http\Resources\PpidPermohonan;
use Illuminate\Support\Facades\Validator; //import validator

class PpidPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permohonan = Ppid_permohonan::get();
        return new PpidPermohonan(true, 'Permohonan Informasi', $permohonan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
    //     $rules = [


    //           `kategori_pemohon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `unit_id` int NOT NULL DEFAULT '0',
    //           `unit_id_tujuan` int NOT NULL DEFAULT '0',
    //           `nomor_identitas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `alamat` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `pekerjaan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `no_tlp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `rincian` text COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `cara_memperoleh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `cara_mendapat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `file_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    //           `setuju` int NOT NULL DEFAULT '1',
    //           `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MENUNGGU',
    //           `tracking_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,


    //     ];

    //     $customMessages = [
    //         'required' => 'The :attribute field is required.'
    //     ];

    //     $this->validate($request, $rules, $customMessages);

    //     //data
    //     'title'            = $request->title,
    //     'description'      = 'required',
    //     'images'           = 'required|mimes:pdf,doc,docx,xls,xlsx,zip|max:2048',
    //     'kategori_pemohon' = 'required',
    //     'unit_id'          = 'required',
    //     'unit_id_tujuan'   = 'required',
    //     'nomor_identitas'  = 'required',
    //     'nama'             = 'required',
    //     'alamat'           = 'required',
    //     'pekerjaan'        = 'required',
    //     'no_tlp'           = 'required',
    //     'email'            = 'required'|'email',
    //     'rincian'          = 'required',
    //     'tujuan'           = 'required',
    //     'cara_memperoleh'  = 'required',
    //     'cara_mendapat'    = 'required',
    //     'file_name'        = 'required|mimes:pdf,zip,jpg,png,jpeg|max:2048',
    //     'setuju'           = 'required',
    //     'tracking_no'      = 'required',

    //     try{

    //         if ($request->hasFile('images')){
    //             $image = $request->file('images');
    //             $ext = $image->getClientOriginalExtension();
    //             if ($request->file('images')->isValid()){
    //                 $image_name = date('YmdHis').".$ext";
    //                 $upload_path = 'public/images/slide';
    //                 $request->file('images')->move($upload_path, $image_name);
    //             }

    //         }

    //         Slide::create([
    //             'title'         => $title,
    //             'slug'          => Str::slug($title, '-'),
    //             'pic'           => $image_name,
    //             'link'          => '#',
    //             'unit_id'       => $unit,
    //             'created_by'   => $user,
    //             'updated_by'    => $user,

    //         ]);

    //         $permohonan = Ppid_permohonan::get();
    //         return new PpidPermohonan(true, 'Permohonan Informasi', $permohonan);
    //      }
    //         catch(\Exception $e){
    //             dd($e);
    //      }


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
