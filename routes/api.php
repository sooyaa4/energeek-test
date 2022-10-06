<?php

use App\Http\Controllers\Api\ApiInputController;
use App\Http\Controllers\Api\JobsApiController;
use App\Models\SkillsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('add', [ApiInputController::class, 'addData']);
Route::get('jobs', [JobsApiController::class, 'all']);
Route::get('skills', [SkillsModel::class, 'all']);
