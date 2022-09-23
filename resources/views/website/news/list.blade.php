<div class="container-fluid">
    @forelse($newses as $news)
        <div class="row">
            <div class="container-fluid ">
                <div class="row justify-content-center py-5" style="background-color: #dee2e6">
                    <div class="col-sm-4 text-end">
                        <img src="{{asset($news->image)}}" class="blog-image" alt="{{ $news->heading }}">
                    </div>
                    <div class="col-sm-5">
                        <h3 class="fw-bold blog-text">
                            <a>{{ $news->heading }}</a>
                        </h3>
                        <p><span>{{ $news->created_at }}</span></p>
                        <p>
                            {{$news->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>
