{{--<div class="accordion-item">--}}
{{--    <h2 class="accordion-header" id="employment_heading">--}}
{{--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#employment"--}}
{{--                aria-expanded="false" aria-controls="collapseOne">--}}
{{--            {{ __('general.record_witness') }}--}}
{{--        </button>--}}
{{--    </h2>--}}

{{--    <div id="employment" class="accordion-collapse collapse bg-white" aria-labelledby="employment_heading"--}}
{{--         data-bs-parent="#accordionExample">--}}
{{--        <div class="accordion-body">--}}
<h4 class="card-title text-purple">{{ __('general.record_witness') }}</h4>
<hr>
<div class="fields">
    {{--General Row--}}
    <div class="row mb-3">
        <div class="col-12">
            <p>{{ __('general.verification_by') }}</p>
        </div>
        <hr>
        @include('dashboard.common.hr-picker', ['fieldName' => 'verified_hr_id'])
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <p>{{ __('general.witness') }}</p>
        </div>
        <hr>
        @include('dashboard.common.hr-picker', ['fieldName' => 'witness_hr_id'])
    </div>
</div>
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
