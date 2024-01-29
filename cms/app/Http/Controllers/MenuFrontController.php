<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuFront;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Unit;

class MenuFrontController extends Controller
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
        $front = MenuFront::where('unit_id', $unit_id)->orderBy('sort')->get();
        $unit = Unit::where('id', $unit_id)->get();
       
        return view('admin.front.front', compact('unit', 'front'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.front.create');
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
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2084',
            'link'  =>'required',
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        //data
        $title      = $request->title;
        $link       = $request->link;
        $urut       = $request->urut;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
     
        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/front';
                    $request->file('images')->move($upload_path, $image_name);
                }

            }

            MenuFront::create([
                'title'         => $title,
                'pic'           => $image_name,
                'link'          => $link,
                'unit_id'       => $unit,
                'created_by'    => $user,
                'updated_by'    => $user,
                'sort'          => $urut

            ]);
            return redirect()->route('front')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){  
                return redirect()->route('front_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
        $front = MenuFront::find($id);
        return view('admin.front.edit', compact('front'));
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
        $title      = $request->title;
        $data_link  = $request->link;
        $urut       = $request->urut;  
        $user       = auth::user()->id;
        $id         = $request->id;

        
        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/front';
                    $request->file('images')->move($upload_path, $image_name);
                }

                $link = MenuFront::find($id);
                $link->update([
                    'title'         => $title,
                    'pic'           => $image_name,
                    'link'          => $data_link,
                    'updated_by'    => $user,
                    'sort'          => $urut,

                ]);

            }else{
                $link = MenuFront::find($id);
                $link->update([
                    'title'         => $title,
                    'link'          => $data_link,
                    'updated_by'    => $user,
                    'sort'          => $urut,

                ]);
            }
            return redirect()->route('front')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){  
                return redirect()->route('front_edit', $id)->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $link = MenuFront::find($id);
        $link->delete();
        return redirect()->route('front')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
