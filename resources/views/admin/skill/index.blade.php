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
                            <li><a href="">بخش خانه</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">تنظیمات بخش مهارت ها</div>

                    <div class="card-body">

                        <table id="customers">
                            <tr>
                                <th>مهارت</th>
                                <th>درصد</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            @foreach($skill as $item)
                                <tr>
                                    <td>{{$item->skill}}</td>
                                    <td>{{$item->percentage}}</td>
                                    <td><a href="{{route('skill.edit', ['id' => $item->id])}}" class="btn btn-secondary">ویرایش</a></td>

                                    <td><a href="" onclick="destroyUser(event,{{$item->id}})" class="btn btn-danger">حذف</a>
                                        <form action="{{route('skill.destroy',$item->id)}}" id="userdelete-{{$item->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <hr>
                        <a href="{{route('skill.create')}}" class="btn btn bg-success  text-white mt-2">اضافه کردن</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function destroyUser(event,id){
            event.preventDefault();
            document.querySelector('#userdelete-'+id).submit();
        }
    </script>
@endsection
