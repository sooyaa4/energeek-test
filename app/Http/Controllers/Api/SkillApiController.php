<?php

namespace App\Http\Controllers\Api;

use App\Models\SkillsModel;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class SkillApiController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if($id)
        {
            $skills = SkillsModel::find($id);

            if($skills) {
                return ResponseFormatter::success(
                    $skills,
                    'Data job berhasil diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    null,
                    'Data job tidak ada',
                    404
                );
            }
        }

        $skills = SkillsModel::all();

        return ResponseFormatter::success(
            $skills,
            'Data jobs berhasil diambil'
        );
    }
}
