<section class="skill py-1">
    <div class="skill-title text-center ">
        <h2 class="fw-bold">مهارت های من</h2>
        <p class="text-muted px-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, aut beatae commodi dolor enim eum illum, impedit incidunt laboriosam maxime minus nisi nobis perspiciatis quam quisquam voluptate voluptates voluptatum.</p>
    </div>
    <div class="container pb-3">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="skill-text">
                    <h3 class="fs-4 fw-bold pb-3">{{$about->title}}</h3>
                    <p class="text-muted">{{$about->description}}</p>
                    <a href="{{$about->link}}" class="btn btn-danger px-4">با من صحبت کن</a>
                </div>
            </div>
            <div class="col-lg-6 align-items-center">
                @foreach($skill as $item)

                <div class="progress mt-3">
                    <div class="progress-bar bg-success" role="progressbar" aria-label="Success example" style="width: {{$item->percentage}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$item->skill}}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
