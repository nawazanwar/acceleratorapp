
<style></style>

<x-page-layout
    :page="$page">
    <x-slot name="content">
        <section class="startup-holder pb-5">
            <section class="mb-5" style="background-color: #dee2e6">
                <div class="container how-we-are-holder pt-4">
                    <div class="row">
                        <div class="col-6 mx-auto text-center">
                            <h1 class="who-are-you">Who We Are?</h1>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row mx-1">
                        <div class="col-5 border-top" style="background-color: #3b3a3a"> </div>
                        <div class="col-2"> </div>
                        <div class="col-5 border-top" style="background-color: #3b3a3a"> </div>
                    </div>
                </div>
                <div class="container how-we-are-holder py-3">
                    <div class="row">
                        <div class="col-6 mx-auto text-center">
                            <h6 class="h6-text">A national gathering of business incubators, accelerators, co-working spaces, and all parties related or interested in creating the entrepreneurship ecosystem in the Kingdom.</h6>
                            <a class="read-more btn px-sm-5 fw-sm-bold py-sm-3">Read More</a></div>
                    </div>
                </div>
            </section>
        </section>
        <section class="startup-holder">

            <div class="container how-we-are-holder" style="margin-top: -10px">
                <div class="row">
                    <div class="col-12 mb-5 mx-auto text-center">
                        <h1 class="who-are-you">What We do?</h1>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @if(is_object($startup_services))
                        @if(count($startup_services)>0)
                            @foreach($startup_services as $service)
                                <div class="col-lg-2 col-sm-4 mb-4">
                                    <div class="card py-3 rounded-3 card-shadow h-100">
                                        <img class="card-img-adjust py-2 px-1" onerror="this.src='{{ asset('uploads/default_service.png') }}'" src="{{ asset(sprintf('uploads/%s.png',$service->slug)) }}" alt="Card image cap" style="width: 100%;height: 100%;max-height: 100px;"><hr>
                                        <div class="card-body">
                                            <h6 class="card-title text-center fs-6">{{ $service->name }}</h6>
                                        </div>
                                        <div class="card-footer text-center" style="background-color: transparent!important;">
                                            @if($service->slug =='incubator')
                                                <a class="btn rounded-3 mb-2" href="{{route('website.offices.index',$startup_id)}}">{{ trans('general.explore') }}</a>
                                                <a href="#" class="btn rounded-3 mb-2">{{ trans('general.Subscribe') }}</a>
                                            @else
                                                <a class="btn rounded-3 mb-2 card-btn">{{ trans('general.explore') }}</a>
                                                <a class="btn rounded-3 mb-2 card-btn">{{ trans('general.Subscribe') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </section>
        <section class="container p-3 mt-5 mb-5">
            <section class="mb-5">
                <div class="container how-we-are-holder pt-4">
                    <div class="row">
                        <div class="col-6 mx-auto text-center">
                            <h1 class="who-are-you">Where We Locate?</h1>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row mx-1">
                        <div class="col-5 border-top"> </div>
                        <div class="col-2"> </div>
                        <div class="col-5 border-top"> </div>
                    </div>
                </div>
            </section>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=800&amp;height=400&amp;hl=en&amp;q=optimum tech fasilabad&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    <a href="https://mcpenation.com/">Minecraft Website</a>
                </div>
            </div>
        </section>

        <section class="mb-5 pb-4">
            <section class="mb-5">
                <div class="container how-we-are-holder pt-4">
                    <div class="row">
                        <div class="col-6 mx-auto text-center">
                            <h1 class="who-are-you">Contact Information</h1>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row mx-1">
                        <div class="col-5 border-top"> </div>
                        <div class="col-2"> </div>
                        <div class="col-5 border-top"> </div>
                    </div>
                </div>
            </section>
            <section class="contact-page-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 top_animation">
                            <div class="contact-info contact-shadow">
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-map-marked"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <h2 class="contact-head">address</h2>
                                        <span class="contact_text">Optimum Tech </span>
                                        <span class="contact_text">Faisalabad , Pakistan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 top_animation">
                            <div class="contact-info contact-shadow">
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <h2 class="contact-head">E-mail</h2>
                                        <span class="contact_text">optimumtech@info.com</span>
                                        <span class="contact_text">optimumtech@gmail.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 top_animation">
                            <div class="contact-info contact-shadow">
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <h2 class="contact-head">office time</h2>
                                        <span class="contact_text">Mon - Thu  9:00 am - 4.00 pm</span>
                                        <span class="contact_text">Thu - Mon  10.00 pm - 5.00 pm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>


    </x-slot>
</x-page-layout>
