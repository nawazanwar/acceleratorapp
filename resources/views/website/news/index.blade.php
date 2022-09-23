<x-page-layout
    :page="$page">
    <x-slot name="content">
        <section>
            <div class="">
                <div style="display: flex;flex-wrap: wrap">
                    @forelse($newses as $news)
                        @if($loop->index<4)
                            <div class="col-md-3">
                                <div class="our-story wow fadeInUp"
                                     style="background: url('{{ asset($news->image) }}') no-repeat center;background-size: cover;"
                                     data-wow-duration="0.5s" data-wow-delay="0.2s">
                                    <div class="">
                                        <div class="our-story-content1 wow fadeInUp" data-wow-duration="0.5s"
                                             data-wow-delay="0.5s">
                                            <div class="our-story-content-inner">
                                                <p>{{ $news->heading }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </section>
        <section class="my-5 py-5 meet-startup-holder"
                 style="background-image: url({{ asset('uploads/meet_back.webp') }})">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center py-3">
                        <input type="text" class="form-control form-control-desgin" placeholder="e.g event , meet up"/>
                        <input type="button" class="btn mt-3 py-2 px-5" value="Search"/>
                    </div>
                </div>
            </div>
        </section>
        <section class="my-5 py-5 about-us-holder">
            @include('website.news.list')
        </section>
    </x-slot>
</x-page-layout>
