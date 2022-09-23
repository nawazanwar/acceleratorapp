<x-page-layout
    :page="$page">
    <x-slot name="content">
        <section class="startup-holder py-5">
            <div class="container">
                <div class="row text-center">
                    <div class="col-10 m-auto">
                        <h1>{{ trans('general.plans') }}</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="startup-holder  bg-body py-5">
            <div class="container">
                <div class="row pt-3 justify-content-center">
                    <div class="row pricing-plan">
                        @foreach($plans as $plan)
                            <div class="pricing-block px-1 col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <div class="icon-outer"><i class="bx bxs-plane"></i></div>
                                    </div>
                                    <div class="price-box">
                                        <div class="title">{{ $plan->name }}</div>
                                        <h4 class="price">{{ $plan->price }} {{ \App\Services\GeneralService::get_default_currency() }}</h4>
                                        <div class="month">
                                            @if($plan->duration>1)
                                                {{ trans('general.months') }}
                                            @else
                                                {{ trans('general.month') }}
                                            @endif  {{ $plan->duration }}
                                        </div>
                                    </div>
                                    <ul class="features">
                                        <li class="fw-bold site-second-color"
                                            style="padding-left: 0;">{{ trans('general.basic_service') }}</li>
                                        @foreach($plan->basic_services as $service)
                                            <li class="true">
                                                <i class="fa  fa-check-circle"></i>
                                                {{ $service->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="features">
                                        <li class="fw-bold site-second-color"
                                            style="padding-left: 0;">{{ trans('general.additional_service') }}</li>
                                        @foreach($plan->additional_services as $service)
                                            <li class="true">
                                                <i class="fa  fa-check-circle"></i>
                                                {{ $service->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="btn-box pt-4">
                                        @guest
                                            <a class="btn site-first-btn-color" style="border-radius: 5px;"
                                               href="{{ route('website.customers.create',[\App\Enum\StepEnum::USER_INFO]) }}">
                                                {{ trans('general.login_to_subscribed') }}
                                            </a>
                                        @else
                                            @if(\App\Services\PersonService::hasRole(\App\Enum\RoleEnum::CUSTOMER))
                                                <a class="btn site-first-btn-color" style="border-radius: 5px;"
                                                   onclick="apply_office_plan_subscription(
                                                  '{{$plan->id}}',
                                                  '{{ auth()->id() }}',
                                                  '{{$office->getOwnerId()}}',
                                                  '{{$office->id}}',
                                                  );">
                                                    {{ trans('general.apply_subscription') }}
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @include('components.common-scripts')
    </x-slot>
</x-page-layout>
