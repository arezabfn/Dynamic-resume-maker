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

                        <table id="customers">
                            <tr>
                                <th>عنوان</th>
                                <th>نام</th>
                                <th>شغل</th>
                                <th>توضیح</th>
                                <th>لینک</th>
                                <th>عکس</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            @foreach($home as $item)
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->yourname}}</td>
                                    <td>{{$item->job}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->link}}</td>
                                    <td><img src="{{asset('admin/image/home/'.$item->image)}}" width="70px" height="60px" alt=""></td>
                                    <td><a href="{{route('homePage.edit', ['id' => $item->id])}}" class="btn btn-secondary">ویرایش</a></td>

                                    <td><a href="" onclick="destroyUser(event,{{$item->id}})" class="btn btn-danger">حذف</a>
                                        <form action="{{route('homePage.destroy',$item->id)}}" id="userdelete-{{$item->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <a href="{{route('homePage.create')}}" class="btn btn bg-success  text-white mt-2">اضافه کردن</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsectionnp

@section('js')
    <script>
        function destroyUser(event,id){
            event.preventDefault();
            document.querySelector('#userdelete-'+id).submit();
        }
    </script>
@endsection
