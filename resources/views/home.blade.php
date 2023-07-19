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
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    شما اکنون در داشبورد و صفحه اصلی سایت قرار دارید
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
