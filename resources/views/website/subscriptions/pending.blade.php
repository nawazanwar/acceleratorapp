<x-register-layout
    :page="\App\Services\CMS\PageService::getHomePage()"
    type="pending_subscription"
    step="pending">
    <x-slot name="content">
        <div class="container p-4">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
                    <div class="row justify-content-center mt-3 pt-3">
                        <div class="col-12 my-3 text-right">
                            @if($type)
                                @if($type==\App\Enum\RoleEnum::BUSINESS_ACCELERATOR)
                                    <a class="btn  btn-primary site-first-btn-color mx-2"
                                       href="{{ route('website.ba.create',[$subscription->subscribed->ba->type,$subscription->subscribed->ba->payment_process,\App\Enum\StepEnum::USER_INFO,$subscription->subscribed->ba->id,'action'=>'edit']) }}">
                                        {{ trans('general.edit_profile') }}
                                    </a>
                                @endif
                                @if($type==\App\Enum\RoleEnum::FREELANCER)
                                    <a class="btn  btn-primary site-first-btn-color mx-2"
                                       href="{{ route('website.freelancers.create',[$subscription->subscribed->freelancer->type,$subscription->subscribed->freelancer->payment_process,\App\Enum\StepEnum::USER_INFO,$subscription->subscribed->freelancer->id,'action'=>'edit']) }}">
                                        {{ trans('general.edit_profile') }}
                                    </a>
                                @endif
                                @if($type==\App\Enum\RoleEnum::MENTOR)
                                    <a class="btn  btn-primary site-first-btn-color mx-2"
                                       href="{{ route('website.mentors.create',[$subscription->subscribed->mentor->payment_process,\App\Enum\StepEnum::USER_INFO,$subscription->subscribed->mentor->id,'action'=>'edit']) }}">
                                        {{ trans('general.edit_profile') }}
                                    </a>
                                @endif
                                @if(!$receipt)
                                    <a class="btn  btn-primary site-first-btn-color mx-2" onclick="apply_pending_payment();">
                                        {{ trans('general.apply_payment') }} <i class="bx bx-plus-circle"></i>
                                    </a>
                                @endif
                            @endif
                        </div>
                        <div class="col-12">
                            <div class="card  bg-white mb-0">
                                <div class="card-header">
                                    <h4 class="fw-bold mb-0">{{__('general.package_info')}}</h4>
                                </div>
                                <div class="card-body px-0 py-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span>{{__('general.package_name')}}</span>
                                            <span
                                                class="pull-right">{{ str_replace('_',' ',$subscription->package->name) }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>{{__('general.price')}}</span>
                                            <span
                                                class="pull-right">{{ $subscription->price }} {{ \App\Services\GeneralService::get_default_currency() }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>{{__('general.payment_token_number')}}</span>
                                            <span class="pull-right">{{ $subscription->payment_token_number }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>{{__('general.created_date')}}</span>
                                            <span class="pull-right">{{ $subscription->created_at }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if($receipt)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 fw-bold">{{ trans('general.payment_info') }}</h4>
                                    </div>
                                </div>
                                <div class="card-body px-0 py-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span>{{__('general.payment_type')}}</span>
                                            <span
                                                class="pull-right">{{ \App\Enum\PaymentTypeEnum::getTranslationKeyBy($receipt->payment_type) }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>{{__('general.payment_for')}}</span>
                                            <span
                                                class="pull-right">{{ \App\Enum\PaymentForEnum::getTranslationKeyBy($receipt->payment_for) }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>{{__('general.transaction_id')}}</span>
                                            <span class="pull-right">{{ $receipt->transaction_id }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>{{__('general.payment')}}</span>
                                            <span
                                                class="pull-right">{{ $receipt->price }} {{ \App\Services\GeneralService::get_default_currency() }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('components.common-scripts')
    </x-slot>
</x-register-layout>
