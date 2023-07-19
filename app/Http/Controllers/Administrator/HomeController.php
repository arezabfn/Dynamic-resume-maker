<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;


class HomeController extends Controller
{

    public function index()
    {
        $home = Home::all();
        return view('admin.home.index',compact('home'));
    }

    public function create()
    {
        return view('admin.home.create');
    }

    public function store(Request $request)
    {
        Facades\Validator::make($request->all(),[
           'title'=>'required',
           'yourname'=>'required',
           'job'=>'required',
           'description' =>'required',
           'link'=>'required',
           'image'=>'required',
        ],[
            'title.required'=>'وارد کردن عنوان الزامی است',
            'yourname.required'=>'وارد کردن نام اجباری است',
            'job.required'=>'وارد کردن شغل اجباری است',
            'description.required'=>'وارد کردن متن اجباری است',
            'link.required'=>'وارد کردن لینک اجباری است',
            'image.required'=>'انتخاب عکس اجباری است',
        ])->validate();

        $file = $request->file('image');
        $image = "";
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/image/home',$image);
        }
        Home::create([
           'image' => $image ,
            'title' => $request->title,
            'yourname'=> $request->yourname,
            'job' => $request->job,
            'description' => $request->description,
            'link' => $request->link
        ]);
        return redirect()->route('homePage.index');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $home = Home::findOrfail($id);
        return view('admin.home.edit',compact('home'));
    }


    public function update(Request $request, string $id)
    {
        Facades\Validator::make($request->all(),[
            'title'=>'required',
            'yourname'=>'required',
            'job'=>'required',
            'description' =>'required',
            'link'=>'required',
        ],[
            'title.required'=>'وارد کردن عنوان الزامی است',
            'yourname.required'=>'وارد کردن نام اجباری است',
            'job.required'=>'وارد کردن شغل اجباری است',
            'description.required'=>'وارد کردن متن اجباری است',
            'link.required'=>'وارد کردن لینک اجباری است',
        ])->validate();

        $home = Home::findOrFail($id);
        $file = $request->file('image');
        $image = "";
        if(!empty($file)){
            if(file_exists('admin/image/home/'.$home->image)){
                unlink('admin/image/home/'.$home->image);
            }
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/image/home',$image);
        }
        else{
            $image = $home->image;
        }
        $home->update([
           'image' => $image,
           'yourname'=> $request->yourname,
            'link' => $request->link,
            'job' => $request->job,
            'description' => $request->description,
            'title' => $request->title,
        ]);
        return redirect()->route('homePage.index');
    }


    public function destroy(string $id)
    {
        $home = Home::findOrFail($id);
            if(file_exists('admin/image/home/'.$home->image)){
                unlink('admin/image/home/'.$home->image);
            }
            $home->destroy($id);
            return redirect()->route('homePage.index');


    }
}
