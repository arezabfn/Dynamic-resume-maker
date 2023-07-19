<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\About;
use App\Models\Skill;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index()
    {
        $home = Home::orderBy('id','desc')->first();
        $about = About::orderBy('id','desc')->first();
        $skill = Skill::all();
        return view('front.index',compact('home','about','skill'));
    }
}
