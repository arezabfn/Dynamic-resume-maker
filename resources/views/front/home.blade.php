<div class="home">
    <div class="container-fluid">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-6">
                <div class="home-text">
                    <h1 class="fw-bold pb-3">{{$home->title}}</h1>
                    <h2 class="fw-bold">{{$home->yourname}}</h2>
                    <h4>{{$home->job}}</h4>
                    <p class="text-muted">{{$home->description}}</p>
                    <a href="{{$home->link}}" class="btn btn-danger px-5">درباره من</a>
                </div>
            </div>
            <div class="col-lg-6 min-vh-100">
                <div class="home-img">
                    <img src="{{asset('admin/image/home/'.$home->image)}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
