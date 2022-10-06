<?php

namespace App\Http\Controllers\Api;

use App\Models\JobsModel;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class JobsApiController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if($id)
        {
            $jobs = JobsModel::find($id);

            if($jobs) {
                return ResponseFormatter::success(
                    $jobs,
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

        $jobs = JobsModel::all();

        return ResponseFormatter::success(
            $jobs,
            'Data jobs berhasil diambil'
        );
    }
}
