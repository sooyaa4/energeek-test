<?php

namespace App\Http\Controllers\Api;
use Exception;
use Illuminate\Http\Request;
use App\Models\SkillSetModel;
use App\Models\CandidatesModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiInputController extends Controller
{
    public function addData(Request $request, Validator $validator)
    {
        try {
            $request->validate([
                'name'      => 'required',
                'telp'      => 'required|numeric|unique:candidates,phone',
                'email'     => 'required|email|unique:candidates,email',
                'jabatan'    => 'required',
                'skill'    => 'required',
                'year' =>'required',
            ]);
            
            $candidate = CandidatesModel::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->telp,
                'job_id'     => $request->jabatan,
                'year'      => $request->year,
            ]);
    
            foreach (explode(',', implode($request->skill)) as $a) {
                SkillSetModel::create([
                    'skill_id' => $a,
                    'candidate_id' => $candidate->id
                ]);
            }
           return ResponseFormatter::success($candidate->load('skillsets'), 'Data berhasil ditambah');
        } catch  (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Data Tidak Sesuai',
                'error' => $validator->$error,
            ],'Gagal menambah data', 500);
        }
    }     
}
