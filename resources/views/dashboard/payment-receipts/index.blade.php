@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none pt-0">
                <div class="card-body">
                    <table class="table custom-datatable table-bordered table-hover">
                        @include('dashboard.components.general.table-headings',['headings'=>\App\Enum\TableHeadings\ReceiptTableHeading::getTranslationKeys()])
                        <tbody>
                        @forelse($records  as $record)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    @isset($record->subscribed)
                                        <a target="_blank"> {{ $record->subscribed->getFullName()  }}</a>
                                    @endisset
                                </td>
                                <td>
                                    @if($record->payment_type)
                                        {{ \App\Enum\PaymentTypeEnum::getTranslationKeyBy($record->payment_type) }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    @if($record->payment_for)
                                        {{ \App\Enum\PaymentForEnum::getTranslationKeyBy($record->payment_for) }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    {{ $record->transaction_id }}
                                </td>
                                <td>
                                    {{ $record->price }}  {{ \App\Services\GeneralService::get_default_currency() }}
                                </td>
                                <td class="text-center">
                                    @if($record->payment_for==\App\Enum\PaymentForEnum::PACKAGE_APPROVAL)
                                        <a class="btn btn-sm btn-info  mx-1"
                                           onclick="approved_subscription('{{ $record->id}}','{{ $record->subscribed->id }}');">
                                            {{ trans('general.approved') }} <i class="bx bx-plus-circle"></i>
                                        </a>
                                        <a class="btn btn-sm btn-info  mx-1"
                                           onclick="decline_subscription('{{ $record->id}}','{{ $record->subscribed->id }}');">
                                            {{ trans('general.declined') }} <i class="bx bx-minus-circle"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-sm btn-info  mx-1"
                                           onclick="renew_subscription('{{ $record->id}}','{{ $record->subscribed->id }}');">
                                            {{ trans('general.renew') }} <i class="bx bx-plus-circle"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('innerScript')
    <script>
        function approved_subscription(subscription_id, subscribed_id) {
            Swal.fire({
                title: '{{ trans('general.approved') }}',
                html: '{!! Form::textarea('reason',null,['class'=>'form-control','placeholder'=>trans('general.reason_for_approving'),'rows'=>'3']) !!}',
                confirmButtonText: '{{ trans('general.save') }}',
                focusConfirm: true,
            }).then((result) => {

            });
        }
        function decline_subscription(subscription_id, subscribed_id) {
            Swal.fire({
                title: '{{ trans('general.declined') }}',
                html: '{!! Form::textarea('reason',null,['class'=>'form-control','placeholder'=>trans('general.reason_for_declining_subscription'),'rows'=>'3']) !!}',
                confirmButtonText: '{{ trans('general.save') }}',
                focusConfirm: true,
            }).then((result) => {

            });
        }
    </script>
@endsection
