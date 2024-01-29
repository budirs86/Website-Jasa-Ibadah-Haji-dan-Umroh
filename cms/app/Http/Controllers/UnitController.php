<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UnitController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $unit = Unit::all();
        return view('admin.unit_kerja.unit_kerja', compact('unit'));
    } 

    public function create()
    {
        return view('admin.unit_kerja.create');
    }


    public function store(Request $request)
    {

        $rules = [
            'link' => 'required|min:10',
            'unit_kerja' => 'required|max:250',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);
        //data
        $link = $request->link;
        $unit_kerja = $request->unit_kerja;
        $user = auth::user()->id;
    
        try{
              //create unit
            Unit::create([
                'link' => $request->link,
                'unit_kerja'     => $request->unit_kerja,
                'created_by' => $user,
            ]);

            return redirect()->route('unit_kerja')->with(['success' => 'Data Berhasil Disimpan!']);

         }
            catch(\Exception $e){
                return redirect()->route('unit_kerja_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
         }

    }

    public function edit(Request $request)
    {
        $unit = Unit::find($request->id);        
        return view('admin.unit_kerja.edit', compact('unit'));
    }

    public function update(Request $request)
    {

        $rules = [
            'link' => 'required|min:10',
            'unit_kerja' => 'required|max:250',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);
        //data
        $link = $request->link;
        $unit_kerja = $request->unit_kerja;
        $user = auth::user()->id;
    
        try{
         
        $unit = Unit::find($request->id);
        $unit->update([
            'link' => $request->link,
            'unit_kerja' => $request->unit_kerja,
            'edited_by' => $user,
        ]);
        
        //redirect to index unit
        return redirect()->route('unit_kerja')->with(['success' => 'Data Berhasil Disimpan!']);

         }
         catch(\Exception $e){
            return redirect()->route('unit_kerja_edit')->with(['errors' => 'Data Tidak Berhasil Disimpan!']);
            
         }

    }

    public function destroy(Request $request)
    {
        $id=$request->id;
        $unit=Unit::find($id);
        $unit->delete();
        return redirect()->route('unit_kerja')->with(['success' => 'Data Berhasil Dihapus!']);
    } 
  
   
}
