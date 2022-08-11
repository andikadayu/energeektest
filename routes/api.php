<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('jobs', [\App\Http\Controllers\JobController::class, 'index']);
Route::post('jobs', [\App\Http\Controllers\JobController::class, 'store']);
Route::put('jobs/{id}', [\App\Http\Controllers\JobController::class, 'update']);
Route::delete('jobs/{id}', [\App\Http\Controllers\JobController::class, 'destroy']);
Route::get('jobs/{id}', [\App\Http\Controllers\JobController::class, 'show']);
Route::get('jobs-list', [\App\Http\Controllers\JobController::class, 'list']);

Route::get('skills', [\App\Http\Controllers\SkillController::class, 'index']);
Route::post('skills', [\App\Http\Controllers\SkillController::class, 'store']);
Route::put('skills/{id}', [\App\Http\Controllers\SkillController::class, 'update']);
Route::delete('skills/{id}', [\App\Http\Controllers\SkillController::class, 'destroy']);
Route::get('skills/{id}', [\App\Http\Controllers\SkillController::class, 'show']);

Route::get('candidates', [\App\Http\Controllers\CandidateController::class, 'index']);
Route::get('candidates/{id}', [\App\Http\Controllers\CandidateController::class, 'show']);
Route::put('candidates/{id}', [\App\Http\Controllers\CandidateController::class, 'update']);
Route::delete('candidates/{id}', [\App\Http\Controllers\CandidateController::class, 'destroy']);

Route::get('years', [\App\Http\Controllers\RegisterController::class, 'yearlist']);

Route::post('register', [\App\Http\Controllers\RegisterController::class, 'register']);
