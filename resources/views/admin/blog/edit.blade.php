@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">دسترسی سریع به تنظیمات</div>
                    <div class="card-body">
                        <ul>
                            <li><a href="{{route('home')}}">داشبورد</a></li>
                            <li><a href="{{route('homePage.index')}}">بخش خانه</a></li>
                            <li><a href="{{route('about.index')}}">بخش درباره من</a></li>
                            <li><a href="{{route('skill.index')}}">بخش مهارت ها</a></li>
                            <li><a href="{{route('blog.index')}}">بخش بلاگ ها</a></li>
                            <li><a href="">بخش خانه</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">ویرایش بلاگ</div>

                    <div class="card-body">
                        <form action="{{route('blog.update',['id' => $blog])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group mt-2">
                                <label for="">عنوان</label>
                                <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                                @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="">متن</label>
                                <textarea type="text" class="form-control" name="description">{{$blog->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="">عکس</label>
                                <img src="{{asset('admin/image/blog/'.$blog->image)}}" width="80px" alt="">
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-success px-5">ذخیره</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
