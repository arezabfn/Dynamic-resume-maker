<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.index',compact('blog'));
    }


    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $image = '';
        $file = $request->file('image');
        if(!empty($file)){
            $image = 'blog-'.time().'.'.$file->getClientOriginalExtension();
            $file->move('admin/image/blog',$image);
        }
        Blog::create([
           'title'=>$request->title,
           'description'=>$request->description,
           'image'=>$image,
        ]);
       return redirect()->route('blog.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $blog = Blog::findOrfail($id);
        return view('admin.blog.edit',compact('blog'));
    }

    public function update(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {
        //
    }
}
