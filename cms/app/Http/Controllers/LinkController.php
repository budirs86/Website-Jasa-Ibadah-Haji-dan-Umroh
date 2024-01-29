<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Link;

class LinkController extends Controller
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
        $link = Link::where('unit_id', $unit)
        ->orderBy('id', 'DESC')->get();
        return view('admin.link.link', compact('link'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
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
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
     
        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/link';
                    $request->file('images')->move($upload_path, $image_name);
                }

            }

            Link::create([
                'title'         => $title,
                'pic'           => $image_name,
                'link'          => $link,
                'unit_id'       => $unit,
                'created_by'   => $user,
                'updated_by'    => $user,

            ]);
            return redirect()->route('link')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){  
                return redirect()->route('link_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);
            
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
        $link = Link::find($id);
        return view('admin.link.edit', compact('link'));
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
        $data_link       = $request->link;
        $unit       = auth::user()->unit_id;
        $user       = auth::user()->id;
        $id         = $request->id;

        
        try{

            if ($request->hasFile('images')){
                $image = $request->file('images');
                $ext = $image->getClientOriginalExtension();
                if ($request->file('images')->isValid()){
                    $image_name = date('YmdHis').".$ext";
                    $upload_path = 'public/images/link';
                    $request->file('images')->move($upload_path, $image_name);
                }

                $link = Link::find($id);
                $link->update([
                    'title'         => $title,
                    'pic'           => $image_name,
                    'link'          => $data_link,
                    'updated_by'    => $user,

                ]);

            }else{
                $link = Link::find($id);
                $link->update([
                    'title'         => $title,
                    'link'          => $data_link,
                    'updated_by'    => $user,

                ]);
            }
            return redirect()->route('link')->with(['success' => 'Data Berhasil Disimpan!']);
         }
            catch(\Exception $e){  
                return redirect()->route('link_edit', $id)->with(['' => 'Data Tidak Berhasil Disimpan!']);
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
        $link = Link::find($id);
        $link->delete();
        return redirect()->route('link')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
