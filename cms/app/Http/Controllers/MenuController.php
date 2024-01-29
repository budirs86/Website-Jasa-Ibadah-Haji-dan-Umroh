<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Pages;

class MenuController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home()
    {
        $unit_id = auth::user()->unit_id;
        $menu = Menu::where('unit_id', $unit_id)->orderBy('sort')->get();
        $unit = Unit::where('id', $unit_id)->get();
        $unit_menu = Menu::where('parent_id','=',0)
        ->where('unit_id', $unit_id)
        ->get();
        return view('admin.menu.menu', compact('unit', 'menu', 'unit_menu'));
    } 

    public function create()
    {
        $unit = auth::user()->unit_id;
        $menu = Menu::where('unit_id', $unit)
        ->where('parent_id', 0)->get();
        $link = Pages::where('unit_id', $unit)->get();
        return view('admin.menu.create', compact('unit', 'link', 'menu'));
    }

    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|max:250',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        
        $this->validate($request, $rules, $customMessages);
        //data
        $unit_kerja = $request->unit_id;
        $title = $request->title;
        $parent_id = $request->parent_id;
        $urutan = $request->urutan;
        $user = auth::user()->id;
        $link = $request->link;
        
        if (($link) == "external"){
            $link = $request->manual_link ;
        }

        try{
              //create unit
        Menu::create([
            'link'       => $link,
            'unit_id'    => $unit_kerja,
            'title'      => $title,
            'parent_id'  => $parent_id,
            'sort'       => $urutan,
            'created_by' => $user,
            'updated_by' => $user
        ]);

        //redirect to index unit
        return redirect()->route('menu')->with(['success' => 'Data Berhasil Disimpan!']);

         }
         catch(\Exception $e){
            return $e;
         }

    }

    public function edit(Request $request)
    {
        $unit = auth::user()->unit_id;
        $menu = Menu::where('unit_id', $unit)
        ->where('parent_id', 0)->get();
        $link = Pages::where('unit_id', $unit)->get();
        $menu_edit =  Menu::where('unit_id', $unit)
        ->where('id', $request->id)->first();
        return view('admin.menu.edit', compact('unit', 'link', 'menu',  'menu_edit'));
    }

    public function update(Request $request)
    {

        $rules = [
            'title' => 'required|max:250',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        
        $this->validate($request, $rules, $customMessages);
        //data
        $id = $request->id;
        $link = $request->link;
        $title = $request->title;
        $parent_id = $request->parent_id;
        $urutan = $request->urutan;
        $user = auth::user()->id;
        
        if (($link) == "external"){
            $link = $request->manual_link ;
        }
        
        try{
            
            $menu = Menu::find($id);
            $menu->update([
                'link'       => $link,
                'title'      => $title,
                'parent_id'  => $parent_id,
                'sort'       => $urutan,
                'updated_by' => $user
            ]);

        //redirect to index unit
        return redirect()->route('menu')->with(['success' => 'Data Berhasil Disimpan!']);

         }
         catch(\Exception $e){
            return $e;
         }

    }


    public function destroy(Request $request)
    {
        $id=$request->id;
        $menu=Menu::find($id);
        $menu->delete();
        return redirect()->route('menu')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}
