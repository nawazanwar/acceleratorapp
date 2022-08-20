@extends((auth()->user())?'layouts.dashboard':'layouts.website')
@section('innerCSS')
    <style>
        .card {
            border-top: 1px solid #edf1f5 !important;
        }
    </style>
@endsection
@section('css-before')
@endsection
@section('css-after')
@endsection
@section('content')
    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
                <h3 class="text-center fw-bold">{{__('general.pending_subscription')}}</h3>
                <div class="row justify-content-center mt-3 pt-3">
                    <div class="col-12 my-3 text-right">
                        @if($type)
                            @if($type==\App\Enum\RoleEnum::BUSINESS_ACCELERATOR)
                                <a class="btn btn-info btn-sm pull-right"
                                   href="{{ route('website.ba.create',[$subscription->subscribed->ba->type,$subscription->subscribed->ba->payment_process,\App\Enum\StepEnum::USER_INFO,$subscription->subscribed->ba->id,'action'=>'edit']) }}">
                                    {{ trans('general.edit_profile') }}
                                </a>
                            @endif
                            @if($type==\App\Enum\RoleEnum::FREELANCER)
                                <a class="btn btn-info btn-sm pull-right"
                                   href="{{ route('website.freelancers.create',[$subscription->subscribed->freelancer->type,$subscription->subscribed->freelancer->payment_process,\App\Enum\StepEnum::USER_INFO,$subscription->subscribed->freelancer->id,'action'=>'edit']) }}">
                                    {{ trans('general.edit_profile') }}
                                </a>
                            @endif
                            @if($type==\App\Enum\RoleEnum::MENTOR)
                                <a class="btn btn-info btn-sm pull-right"
                                   href="{{ route('website.mentors.create',[$subscription->subscribed->mentor->payment_process,\App\Enum\StepEnum::USER_INFO,$subscription->subscribed->mentor->id,'action'=>'edit']) }}">
                                    {{ trans('general.edit_profile') }}
                                </a>
                            @endif
                            @if(!$receipt)
                                <a class="btn btn-info btn-sm pull-right mx-2" onclick="apply_payment();">
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
                                        <span class="pull-right">{{ str_replace('_',' ',$subscription->package->name) }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>{{__('general.price')}}</span>
                                        <span class="pull-right">{{ $subscription->price }} {{ \App\Services\GeneralService::get_default_currency() }}</span>
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
                                        <span class="pull-right">{{ \App\Enum\PaymentTypeEnum::getTranslationKeyBy($receipt->payment_type) }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>{{__('general.payment_for')}}</span>
                                        <span class="pull-right">{{ \App\Enum\PaymentForEnum::getTranslationKeyBy($receipt->payment_for) }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>{{__('general.transaction_id')}}</span>
                                        <span class="pull-right">{{ $receipt->transaction_id }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span>{{__('general.payment')}}</span>
                                        <span class="pull-right">{{ $receipt->price }} {{ \App\Services\GeneralService::get_default_currency() }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('inner-script-files')
@endsection
@section('innerScript')
    <script>
        function apply_payment() {
            Swal.fire({
                title: '{{ trans('general.apply_payment') }}',
                html: `{!!  Html::decode(Form::label('payment_type' ,__('general.payment_type').'<i class="text-danger">*</i>' ,['class'=>'form-label'])) !!}{{ Form::select('payment_type',\App\Enum\PaymentTypeEnum::getTranslationKeys(),\App\Enum\PaymentTypeEnum::OFFLINE,['class'=>'form-control','id'=>'payment_type','placeholder'=>'Select Payment Type']) }}`,
                confirmButtonText: 'Next',
                focusConfirm: false,
                preConfirm: () => {
                    const payment_type = Swal.getPopup().querySelector('#payment_type').value
                    if (!payment_type) {
                        Swal.showValidationMessage(`First Choose Payment Type`)
                    }
                    return {payment_type: payment_type}
                }
            }).then((result) => {
                let payment_type = result.value.payment_type;
                if (payment_type === '{{ \App\Enum\PaymentTypeEnum::OFFLINE }}') {
                    Swal.fire({
                        title: 'Manage Payment',
                        html: `<div class="fs-13" style="text-align:left;">{!!  Html::decode(Form::label('transaction_id' ,__('general.transaction_id').'<i class="text-danger">*</i>' ,['class'=>'form-label'])) !!}{{ Form::text('transaction_id',null,['class'=>'form-control','id'=>'transaction_id']) }}{!!  Html::decode(Form::label('file_name' ,__('general.receipt'),['class'=>'form-label'])) !!}{{ Form::file('file_name',['class'=>'form-control dropify','id'=>'file_name']) }}</div>`,
                        confirmButtonText: 'Submit',
                        focusConfirm: false,
                        preConfirm: () => {
                            const transaction_id = Swal.getPopup().querySelector('#transaction_id').value;
                            let file_name = Swal.getPopup().querySelector('#file_name');
                            file_name = file_name.files[0];
                            if (!file_name) {
                                Swal.showValidationMessage(`Please Choose Receipt in jpg,png format`)
                            }
                            if (!transaction_id) {
                                Swal.showValidationMessage(`First Enter Transaction ID`)
                            }
                            return {
                                transaction_id: transaction_id,
                                file_name: file_name
                            }
                        }
                    }).then((result) => {
                        Swal.fire({
                            html: '<?php echo __('general.request_wait'); ?>',
                            allowOutsideClick: () => !Swal.isLoading()
                        });
                        Swal.showLoading();
                        let transaction_id = result.value.transaction_id;
                        let file_name = result.value.file_name;
                        let data = new FormData();
                        data.append('payment_type', payment_type);
                        data.append('transaction_id', transaction_id);
                        data.append('subscription_id', "{{ $subscription->id }}");
                        data.append('subscribed_id', "{{ $subscription->subscribed_id }}");
                        data.append('payment_for', "{{ \App\Enum\PaymentForEnum::PACKAGE_APPROVAL }}");
                        data.append('price', "{{ $subscription->package->price }}");
                        data.append('file_name', file_name);
                        $.ajax({
                            url: "{{ route('website.payment-receipts.store')}}",
                            method: 'POST',
                            data: data,
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                if (response.status === true) {
                                    location.reload();
                                }
                            },
                            error: function (response) {
                            }
                        });
                    });
                } else {
                    Swal.fire(
                        'Pending!',
                        'This will be don later!',
                        'pending'
                    )
                }
            });
        }
    </script>
@endsection
