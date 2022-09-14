<x-page-layout
    :page="$page">
    <x-slot name="content">
        <section class="startup-holder py-5" style="background: url('/uploads/startup.PNG')">
            <div class="container">
                <div class="row text-center">
                    <div class="col-10 m-auto">
                        <h1>{{ trans('general.offices') }}</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="startup-holder  bg-body py-5">
            <div class="container">
                <div class="row">
                    @forelse($offices as $office)
                        <div class="column is-one-third-tablet is-one-quarter-desktop is-one-fifth-fullhd">
                            <div class="grid-product">
                                <div class="grid-product-info">
                                    <span>{{ $office->name }}</span>
                                </div>
                                <div class="grid-product-rating">
                                    <i class="fas fa-star highlighted"></i>
                                    <i class="fas fa-star highlighted"></i>
                                    <i class="fas fa-star highlighted"></i>
                                    <i class="fas fa-star highlighted"></i>
                                    <i class="fas fa-star highlighted"></i>
                                </div>
                                <div class="grid-product-image">
                                    <img src="{{ asset('images/icon/company.png') }}"
                                         data-demo-src="{{ asset('images/icon/company.png') }}"
                                         alt="{{ $office->name }}">
                                </div>
                                @if($office->building)
                                    <p class="border-bottom pb-1 mb-2">
                                        <strong>{{ trans('general.building') }}</strong>
                                        <a href="{{ route('website.buildings.index',[$startup_id,'s'=>$office->building->id]) }}"
                                           class="pull-right">
                                            {{ $office->building->name }}
                                        </a>
                                    </p>
                                @endif
                                @if($office->floor)
                                    <p class="border-bottom pb-1 mb-2">
                                        <strong>{{ trans('general.floor') }}</strong>
                                        <a href="{{ route('website.floors.index',[$startup_id,$office->floor->building->id??null,'s'=>$office->floor->id]) }}"
                                           class="pull-right">
                                            {{ $office->floor->name }}
                                        </a>
                                    </p>
                                @endif
                                <p class="border-bottom pb-1">
                                    <strong>{{ trans('general.office_type') }}</strong>
                                    <span class="pull-right">
                                         {{ $office->type->name ?? '' }}
                                    </span>
                                </p>
                                <p class="border-bottom pb-1">
                                    <strong>{{ trans('general.sitting_capacity') }}</strong>
                                    <span class="pull-right">{{ $office->sitting_capacity }}</span>
                                </p>
                                @if($office->getOwnerId())
                                    <p class="border-bottom pb-1">
                                        <strong>{{ trans('general.owner') }}</strong>
                                        <span class="pull-right">{{ $office->getOwnerName() }}</span>
                                    </p>
                                @endif
                                <div class="buttons text-center justify-content-center">
                                    @if(\App\Services\OfficeService::already_subscribed($office->id))
                                        <a class="button is-fullwidth">{{ trans('general.already_subscribed') }}</a>
                                    @else
                                        <a class="button is-fullwidth"
                                           href="{{ route('website.office.plans.index',[$office->id]) }}">
                                            {{ trans('general.subscription_plans') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>
    </x-slot>
</x-page-layout>
