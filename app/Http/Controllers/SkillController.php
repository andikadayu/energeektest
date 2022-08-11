<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $skills = Skills::all();
        $response = [
            "status" => "success",
            "skills" => $skills
        ];
        return response($response, 200);
    }

    public function store(Request $request)
    {
        $skill = Skills::create($request->all());
        $response = [
            "status" => "success",
            "skill" => $skill
        ];
        return response($response, 200);
    }

    public function update(Request $request, $id)
    {
        $skill = Skills::find($id);
        $skill->update($request->all());
        $response = [
            "status" => "success",
            "skill" => $skill
        ];
        return response($response, 200);
    }

    public function destroy($id)
    {
        $skill = Skills::find($id);
        $skill->delete();
        $response = [
            "status" => "success",
            "skill" => $skill
        ];
        return response($response, 200);
    }

    public function show($id)
    {
        $skill = Skills::find($id);
        $response = [
            "status" => "success",
            "skill" => $skill
        ];
        return response($response, 200);
    }
}
