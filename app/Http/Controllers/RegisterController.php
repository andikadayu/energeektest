<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use App\Models\SkillsSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('master');
    }

    public function yearlist(Request $request)
    {
        $years = range(1950, strftime("%Y", time()));
        $response = [
            "status" => "success",
            "years" => $years
        ];
        return response($response, 200);
    }

    public function register(Request $request)
    {
        // validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidates',
            'tahunlahir' => 'required|integer|between:1950,' . strftime("%Y", time()),
            'jabatan' => 'required|string|max:255',
            'skillset' => 'required|max:255',
            'phone' => 'required|unique:candidates',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'tahunlahir.required' => 'Tahun lahir tidak boleh kosong',
            'tahunlahir.integer' => 'Tahun lahir harus berupa angka',
            'tahunlahir.between' => 'Tahun lahir harus antara 1950 dan ' . strftime("%Y", time()),
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'skillset.required' => 'Skillset tidak boleh kosong',
            'phone.required' => 'Telepon tidak boleh kosong',
            'phone.unique' => 'Telepon sudah terdaftar',
        ]);

        // if validation fails, return error message
        if ($validator->fails()) {
            $response = [
                "status" => "error",
                "message" => $validator->errors()->all()
            ];
            return response($response, 200);
        }

        // if validation passes, create a new candidate
        $candidate = new Candidates();
        $candidate->name = $request->input('name');
        $candidate->email = $request->input('email');
        $candidate->year = $request->input('tahunlahir');
        $candidate->job_id = $request->input('jabatan');
        $candidate->phone = $request->input('phone');
        $candidate->save();

        // get id of the new candidate
        $id = $candidate->id;

        // insert to skill set
        $skillset = new SkillsSet();
        $skillset->candidate_id = $id;
        $skillset->skill_id = implode(',', $request->input('skillset', []));
        $skillset->save();

        // return success message
        $response = [
            "status" => "success",
            "message" => "Lamaran berhasil dikirim"
        ];
        return response($response, 200);
    }
}
