<x-register-layout
    :page="\App\Services\CMS\PageService::getHomePage()"
    :type="\App\Enum\AccessTypeEnum::MENTOR"
    :step="$step">
    <x-slot name="content">
        <section class="invoice_holder mb-4" @guest style="
    max-width: 87%;
    margin: auto;
    padding-top: 24px;
" @endguest>
            <div class="container">
                <div class="row text-right py-3">
                    <div class="col-12 text-end">
                        <button class="btn  btn-primary site-first-btn-color"
                                onclick="printMe('print_holder','{{ auth()->guest()?route('website.index'):route('dashboard.index') }}')">
                            <i class="fa fa-print"></i> Print Invoice
                        </button>
                        <a class="btn  btn-primary site-first-btn-color"
                           href="{{ route('website.mentors.create',[$payment,\App\Enum\StepEnum::USER_INFO,$model->id,'action'=>'edit']) }}">
                            <i class="fa fa-edit"></i> Edit Profile
                        </a>
                        @guest
                            <a class="btn  btn-primary site-first-btn-color" href="{{ route('login') }}">
                                <i class="fa fa-check"></i>Login
                            </a>
                        @endguest
                    </div>
                </div>
                <div class="row position-relative p-5" id="print_holder">
                    <div class="col-12">
                        <div class="panel panel-default invoice">
                            <div class="panel-body">
                                <div class="invoice-ribbon">
                                    <div class="ribbon-inner">PAID</div>
                                </div>
                                <div class="row">
                                    <div class="col-12 top-right">
                                        <h3 class=""><u style="color: #212020; letter-spacing: 3px">INVOICE</u></h3>
                                        <span style="letter-spacing: 4px">No -{{ $model->id }}</span>
                                    </div>
                                    <div class="col-12 text-end">
                                        <img src="{{ asset('images/business/ot-logo.png') }}" alt="{{ $model->name }}"
                                             class="logo-img">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h3>To,</h3>
                                        <p>{{ $model->user->email }}</p>
                                        <p>{{__('general.first_name')}} : {{ $model->user->first_name }}</p>
                                        <p>{{__('general.last_name')}} : {{ $model->user->last_name }}</p>
                                        <p>{{__('general.invoice_date')}}
                                            : {{ \Carbon\Carbon::now()->format('M d Y')}}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 border-top">
                                            <table
                                                class="table custom-datatable  table-hover table-responsive table-striped">
                                                <thead>
                                                <tr>
                                                    <th colspan="2" class="table-head text-center">Package Info</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th>{{ trans('general.package_name') }}</th>
                                                    <td>{{ $subscription->package->name??null }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ trans('general.price') }}</th>
                                                    <td>{{ $subscription->price??null }} {{ \App\Services\GeneralService::get_default_currency() }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ trans('general.expire_date') }}</th>
                                                    <td>
                                                        <strong>{{ $subscription->package->duration_limit }}</strong>
                                                        @if($subscription->package->duration_type->slug===\App\Enum\DurationEnum::Daily)
                                                            Days
                                                        @elseif($subscription->package->duration_type->slug===\App\Enum\DurationEnum::MONTHLY)
                                                            Months
                                                        @elseif($subscription->package->duration_type->slug===\App\Enum\DurationEnum::WEEKLY)
                                                            Weeks
                                                        @elseif($subscription->package->duration_type->slug===\App\Enum\DurationEnum::YEARLY)
                                                            Years
                                                        @endif
                                                        After Subscription
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>{{ trans('general.payment_token_number') }}</th>
                                                    <td>{{ $subscription->payment_token_number??null }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ trans('general.addition_info') }}</th>
                                                    <td>{{ $subscription->payment_addition_information??null }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ trans('general.subscription_status') }}</th>
                                                    <td>{{ \App\Enum\SubscriptionStatusEnum::getTranslationKeyBy($subscription->status) }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-4 border-top">
                                            <table class="table custom-datatable  table-hover table-striped ">
                                                <thead>
                                                <tr class="text-center">
                                                    <th class="table-head">{{ trans('general.your_services') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($subscription->package->services as $service)
                                                    <tr class="text-start">
                                                        <td>{{ $service->name }}</td>
                                                        <td class="fs-13">
                                                            @if($service->slug=='incubator')
                                                                {{ ($service->pivot->building_limit)=='∞'?'Unlimited':$service->pivot->building_limit }} {{ trans('general.buildings') }}
                                                                <br>
                                                                {{ ($service->pivot->floor_limit)=='∞'?'Unlimited':$service->pivot->floor_limit }} {{ trans('general.floors') }}
                                                                <br>
                                                                {{ ($service->pivot->office_limit)=='∞'?'Unlimited':$service->pivot->office_limit }}{{ trans('general.offices') }}
                                                            @else
                                                                {{ ($service->pivot->limit)=='∞'?'Unlimited':$service->pivot->limit }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="footer">
                                                <p class="mb-0">Company Information</p>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-4 ">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="col-10">
                                                            <p>+92 301 000 0000</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-4 ">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="col-10">
                                                            <p>pofivy@mailinator.com</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="col-10">
                                                            <p>Debitis sed impedit</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </x-slot>
</x-register-layout>
