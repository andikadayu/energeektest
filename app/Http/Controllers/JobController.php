<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Jobs::all();
        $response = [
            "status" => "success",
            "jobs" => $jobs
        ];
        return response($response, 200);
    }

    public function store(Request $request)
    {
        $job = Jobs::create($request->all());
        $response = [
            "status" => "success",
            "job" => $job
        ];
        return response($response, 200);
    }

    public function update(Request $request, $id)
    {
        $job = Jobs::find($id);
        $job->update($request->all());
        $response = [
            "status" => "success",
            "job" => $job
        ];
        return response($response, 200);
    }

    public function destroy($id)
    {
        $job = Jobs::find($id);
        $job->delete();
        $response = [
            "status" => "success",
            "job" => $job
        ];
        return response($response, 200);
    }

    public function show($id)
    {
        $job = Jobs::find($id);
        $response = [
            "status" => "success",
            "job" => $job
        ];
        return response($response, 200);
    }
}
