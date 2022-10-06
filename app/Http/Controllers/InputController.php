<?php

namespace App\Http\Controllers;

use App\Models\CandidatesModel;
use App\Models\JobsModel;
use App\Models\SkillSetModel;
use App\Models\SkillsModel;
use Illuminate\Http\Request;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = 1970;
        $jobs = JobsModel::all();
        $skills = SkillsModel::all();
        return view('halaman.input', compact(['jobs','skills','year']));
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
        $validatedData = $request->validate([
            'name'      => 'required',
            'telp'      => 'nullable',
            'email'     => 'required|email',
            'jabatan'    => 'required',
            'skill_id'    => 'required',
            'year' =>'required',
        ]);

        $candidate = [
            'name'      => $validatedData['name'],
            'email'     => $validatedData['email'],
            'phone'     => $validatedData['telp'],
            'job_id'     => $validatedData['jabatan'],
            'year'      => $validatedData['year'],
        ];

        $candidate_id = CandidatesModel::create($candidate)->id;

        foreach (explode(',', implode($request->skill_id)) as $skill) {
            SkillSetModel::create([
                'skill_id' => $skill,
                'candidate_id' => $candidate_id
            ]);
        }
        // return dd($validatedData);
        return redirect(route('inputan.index'))->with('success', 'Data berhasil di tambahkan');
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
