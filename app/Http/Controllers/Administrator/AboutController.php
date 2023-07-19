<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::all();
        return view('admin.about.index',compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'title'=>'required',
            'description' =>'required',
            'link'=>'required',
        ],[
            'title.required'=>'وارد کردن عنوان الزامی است',
            'description.required'=>'وارد کردن متن اجباری است',
            'link.required'=>'وارد کردن لینک اجباری است',
        ])->validate();
        About::create([
           'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link
        ]);
       return redirect()->route('about.index');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit',compact('about'));
    }


    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'title'=>'required',
            'description' =>'required',
            'link'=>'required',
        ],[
            'title.required'=>'وارد کردن عنوان الزامی است',
            'description.required'=>'وارد کردن متن اجباری است',
            'link.required'=>'وارد کردن لینک اجباری است',
        ])->validate();
        $about = About::findOrFail($id);
        $about->update([
           'title' => $request->title,
           'description' => $request->description,
           'link' => $request->link
        ]);
        return redirect()->route('about.index');
    }


    public function destroy(string $id)
    {
        $about = About::findOrFail($id);
        $about->destroy($id);
        return redirect()->route('about.index');
    }
}
