<div class="row pt-3 justify-content-center">
    <div class="row pricing-plan">
        @foreach(\App\Services\PackageService::list_packages($package_for) as $package)
            <div class="col-md-4 col-xs-12 col-sm-4 mb-3 pt-2">
                <div class="pricing-box border">
                    <div class="pricing-body pb-0 border-0">
                        <div class="pricing-header border-0">
                            <h4 class="text-center pt-3">{{ $package->name }}</h4>
                            <h2 class="text-center">
                                <span
                                    class="price-sign fs-13">{{ \App\Services\GeneralService::get_default_currency() }}</span><br>
                                {{ $package->price }}
                            </h2>
                            <p class="uppercase mx-3 text-center">
                                <strong>{{ $package->duration_limit }}</strong>
                                @if($package->duration_type->slug===\App\Enum\DurationEnum::Daily)
                                    Days
                                @elseif($package->duration_type->slug===\App\Enum\DurationEnum::MONTHLY)
                                    Months
                                @elseif($package->duration_type->slug===\App\Enum\DurationEnum::WEEKLY)
                                    Weeks
                                @elseif($package->duration_type->slug===\App\Enum\DurationEnum::YEARLY)
                                    Years
                                @endif
                            </p>
                        </div>
                        <div class="price-table-content">
                            @foreach($package->services as $service)
                                @if($service->slug=='incubator')
                                    <div class="row mx-1 border-bottom" style="padding: 10px 0;">
                                        <div class="col-8 align-self-center fs-13" style="text-align: left !important;">
                                            {{ trans('general.buildings') }}
                                        </div>
                                        <div class="col-4 align-self-center fs-13" style="text-align: right !important;">
                                        <span
                                            class="w-bold pull-right badge @if($service->pivot->building_limit>0) bg-success @else bg-danger @endif">
                                            {{ ($service->pivot->building_limit)=='∞'?'Unlimited':$service->pivot->building_limit }}
                                        </span>
                                        </div>
                                    </div>
                                    <div class="row mx-1 border-bottom" style="padding: 10px 0;">
                                        <div class="col-8 align-self-center fs-13" style="text-align: left !important;">
                                            {{ trans('general.floors') }}
                                        </div>
                                        <div class="col-4 align-self-center fs-13" style="text-align: right !important;">
                                        <span
                                            class="w-bold pull-right badge @if($service->pivot->floor_limit>0) bg-success @else bg-danger @endif">
                                            {{ ($service->pivot->floor_limit)=='∞'?'Unlimited':$service->pivot->floor_limit }}
                                        </span>
                                        </div>
                                    </div>
                                    <div class="row mx-1 border-bottom" style="padding: 10px 0;">
                                        <div class="col-8 align-self-center fs-13" style="text-align: left !important;">
                                            {{ trans('general.offices') }}
                                        </div>
                                        <div class="col-4 align-self-center fs-13" style="text-align: right !important;">
                                        <span
                                            class="w-bold pull-right badge @if($service->pivot->office_limit>0) bg-success @else bg-danger @endif">
                                            {{ ($service->pivot->office_limit)=='∞'?'Unlimited':$service->pivot->office_limit }}
                                        </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="row mx-1 border-bottom" style="padding: 10px 0;">
                                        <div class="col-8 align-self-center fs-13" style="text-align: left !important;">
                                            {{ $service->name }}
                                        </div>
                                        <div class="col-4 align-self-center fs-13" style="text-align: right !important;">
                                        <span
                                            class="w-bold pull-right badge @if($service->pivot->limit>0) bg-success @else bg-danger @endif">
                                            {{ ($service->pivot->limit)=='∞'?'Unlimited':$service->pivot->limit }}
                                        </span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="price-row justify-content-center py-3" style="text-align: center;">
                            @if(isset($model->user))
                                @php $selected = \App\Models\Subscription::where('subscribed_id',$model->user->id)->exists() @endphp
                            @else
                                @php $selected =0; @endphp
                            @endif
                            <div class="form-check form-switch d-inline-block">
                                {!! Form::radio('subscription_id',$package->id,$selected,['id'=>$package->id,'class'=>'form-check-input',
                                    'data-name'=>$package->name,
                                    'data-price'=>$package->price,
                                     'data-expiry'=>\App\Services\GeneralService::get_remaining_time($package->duration_type->slug,$package->duration_limit, \Carbon\Carbon::now()),
                                    'required'
                                    ])
                                !!}
                                <label class="form-check-label" for="{{ $package->id }}"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
