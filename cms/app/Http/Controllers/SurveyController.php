<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
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
        $survey = Survey::where('unit_id', $unit_id)->get();
        return view('admin.survey.survey', compact('survey'));
    }

    public function dashboard()
    {
        $unit_id = auth::user()->unit_id;
        $survey = Survey::where('unit_id', $unit_id)->get();
        return view('admin.survey.survey_dashboard', compact('survey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.survey.create');
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
            'pertanyaan' => 'required|max:500',
            'j_1' => 'required|max:200',
            'j_2' => 'required|max:200',
            'j_3' => 'required|max:200',
            'j_4' => 'required|max:200',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);
        //data
        $pertanyaan = $request->pertanyaan;
        $j_1 = $request->j_1;
        $j_2 = $request->j_2;
        $j_3 = $request->j_3;
        $j_4 = $request->j_4;
        $j_5 = $request->j_5;
        $status = $request->status;
        $unit_kerja = auth::user()->unit_id;
        $user = auth::user()->id;

        try{
              //create unit
            Survey::create([
                'pertanyaan' => $pertanyaan,
                'unit_id'    => $unit_kerja,
                'j_1'        => $j_1,
                'j_2'        => $j_2,
                'j_3'        => $j_3,
                'j_4'        => $j_4,
                'j_5'        => $j_5,
                'status'     => $status,
                'created_by' => $user,
                'updated_by' => $user,
            ]);

            return redirect()->route('survey')->with(['success' => 'Data Berhasil Disimpan!']);

         }
            catch(\Exception $e){

                return redirect()->route('survey_create')->with(['' => 'Data Tidak Berhasil Disimpan!']);

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
        $id = $request->id ;
        $survey = Survey::where('id', $id)->first();
        return view('admin.survey.edit', compact('survey'));
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
            'pertanyaan' => 'required|max:500',
            'j_1' => 'required|max:200',
            'j_2' => 'required|max:200',
            'j_3' => 'required|max:200',
            'j_4' => 'required|max:200',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);
        //data
        $pertanyaan = $request->pertanyaan;
        $id = $request->id;
        $j_1 = $request->j_1;
        $j_2 = $request->j_2;
        $j_3 = $request->j_3;
        $j_4 = $request->j_4;
        $j_5 = $request->j_5;
        $status = $request->status;
        $unit_kerja = auth::user()->unit_id;
        $user = auth::user()->id;

        try{
              //update
                $survey = Survey::where('id', $request->id)->first();
                $survey->update([
                'pertanyaan' => $pertanyaan,
                'unit_id'    => $unit_kerja,
                'j_1'        => $j_1,
                'j_2'        => $j_2,
                'j_3'        => $j_3,
                'j_4'        => $j_4,
                'j_5'        => $j_5,
                'status'     => $status,
                'updated_by' => $user,
            ]);

            return redirect()->route('survey')->with(['success' => 'Data Berhasil Disimpan!']);

         }
            catch(\Exception $e){

                return redirect()->route('survey_edit', $id)->with(['' => 'Data Tidak Berhasil Disimpan!']);

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
        //
    }
}
