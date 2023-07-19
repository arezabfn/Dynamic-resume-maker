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
                    <div class="card-header">جزئیات بخش خانه</div>

                    <div class="card-body">
                        <form action="{{route('homePage.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="">عنوان</label>
                                <input type="text" class="form-control" name="title">
                                @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">نام شما</label>
                                <input type="text" class="form-control" name="yourname">
                                @error('yourname')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">شغل</label>
                                <input type="text" class="form-control" name="job">
                                @error('job')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">متن</label>
                                <textarea type="text" class="form-control" name="description"></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">لینک</label>
                                <input type="text" class="form-control" name="link">
                                @error('link')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">عکس</label>
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
