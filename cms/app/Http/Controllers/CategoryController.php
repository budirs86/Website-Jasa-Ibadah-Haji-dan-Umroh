<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        $categorys = Category::where('unit_id', $unit_id)->orderBy('id', 'DESC')->get();
        return view('admin.category.category', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            Category::create([
                'title'         => $title,
                'unit_id'       => $unit,
                'created_by'   => $user,
                'updated_by'    => $user,
            ]);
            return redirect()->route('category')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){
                return redirect()->route('category_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
        $id = $request->id ;
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
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
            'title' => 'required|max:250',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        
        $this->validate($request, $rules, $customMessages);
        //data
        $id = $request->id;
        $title = $request->title;
        $user = auth::user()->id;

        
        try{
            
            $category = Category::find($id);
            $category->update([
                'title'      => $title,
                'updated_by' => $user
            ]);

        //redirect to index unit
        return redirect()->route('category')->with(['success' => 'Data Berhasil Disimpan!']);

         }
         catch(\Exception $e){
            return $e;
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $categorys = Category::find($id);
        $categorys->delete();
        return redirect()->route('category')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
