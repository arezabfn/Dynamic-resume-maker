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
                            <li><a href="">بخش خانه</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">فرم درباره من</div>

                    <div class="card-body">
                        <form action="{{route('skill.update',$skill->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group mt-2">
                                <label for="">مهارت</label>
                                <input type="text" class="form-control" name="skill" value="{{$skill->skill}}">
                                @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">درصد</label>
                                <input type="number" placeholder="%" max="100" min="0" class="form-control" name="percentage" value="{{$skill->percentage}}">
                                @error('link')
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
