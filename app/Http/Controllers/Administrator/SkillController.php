<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function index()
    {
        $skill = Skill::all();
        return view('admin.skill.index',compact('skill'));
    }


    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(Request $request)
    {
        Skill::create([
            'skill'=>$request->skill,
            'percentage' => $request->percentage
        ]);
        return redirect()->route('skill.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $skill = Skill::findOrfail($id);
        return view('admin.skill.edit',compact('skill'));
    }

    public function update(Request $request, string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update([
           'skill'=> $request->skill,
           'percentage'=>$request->percentage
        ]);
        return redirect()->route('skill.index');
    }

    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->destroy($id);
        return redirect()->route('skill.index');
    }
}
