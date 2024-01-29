<?php

namespace App\Http\Controllers;

use App\Models\MenuFrontDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\MenuFront;
use App\Models\Unit;
class MenuFrontDetailController extends Controller
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
        $unit_id = auth::user()->unit_id;
        $front_detail = MenuFrontDetail::orderBy('menu_id', 'DESC')
        ->with('induk')->get();
        $unit = Unit::where('id', $unit_id)->get();
       
        return view('admin.front_detail.front_detail', compact('unit', 'front_detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = auth::user()->unit_id;
        $menu = MenuFront::where('unit_id', $unit)
        ->orderBy('sort')->get();
        return view('admin.front_detail.create', compact('menu'));
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
            'link'  =>'required',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $link       = $request->link;
        $menu_id    = $request->menu_id;
        $urut       = $request->urut;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
     
        try{
            MenuFrontDetail::create([
                'title'         => $title,
                'link'          => $link,
                'unit_id'       => $unit,
                'menu_id'       => $menu_id,
                'created_by'    => $user,
                'sort'          => $urut,

            ]);
            return redirect()->route('front_detail')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){  
                return redirect()->route('front_detail_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
        $menu = MenuFront::where('unit_id', $unit)->get();
        $front_detail = MenuFrontDetail::find($id);
        return view('admin.front_detail.edit', compact('menu','front_detail'));
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
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2084',
            'link'  =>'required',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $induk      = $request->menu_id;
        $title      = $request->title;
        $data_link  = $request->link;
        $urut       = $request->urut;  
        $user       = auth::user()->id;
        $id         = $request->id;

        
        try{
            $link = MenuFrontDetail::find($id);
            $link->update([
                'menu_id'       => $induk,
                'title'         => $title,
                'link'          => $data_link,
                'updated_by'    => $user,
                'sort'          => $urut,

            ]);
        
            return redirect()->route('front_detail')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){  
                return redirect()->route('front_detail_edit', $id)->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $menudetail = MenuFrontDetail::find($id);
        $menudetail->delete();
        return redirect()->route('front_detail')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
