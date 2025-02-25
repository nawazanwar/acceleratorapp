{!! Form::hidden('meeting_organized_by',auth()->id()) !!}
<div class="mb-3 row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4 mb-3 meeting_type_holder">
                {!!  Html::decode(Form::label('meeting_type' ,__('general.meeting_type') ,['class'=>'form-label']))   !!}
                <select name="meeting_type" id="meeting_parent_type" class="form-control"
                        onchange="applyMeetingType(this);">
                    <option value="" selected>{{ trans('general.select') }}</option>
                    @foreach (\App\Services\MeetingService::getMeetingTypes() as $meetingType)
                        <option value="{{ $meetingType->slug }}"
                                data-sub-types="{{ json_encode($meetingType->children) }}">
                            {{ $meetingType->name }}
                        </option>
                    @endforeach
                    <option value="other">{{ trans('general.other') }}</option>
                </select>
            </div>
            <div class="col-md-4 mb-3 meeting_child_type_holder">
                {!!  Html::decode(Form::label('meeting_sub_type' ,__('general.meeting_sub_type') ,['class'=>'form-label']))   !!}
                {!!  Form::select('meeting_sub_type',array(),null,['id'=>'meeting_parent_sub_type','class'=>'form-control ','required','placeholder'=>trans('general.select'),'onchange'=>'changeMeetingSubType(this);']) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!!  Html::decode(Form::label('meeting_name' ,__('general.title') ,['class'=>'form-label']))   !!}
                {!!  Form::text('meeting_name',null,['id'=>'meeting_name','class'=>'form-control']) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!!  Html::decode(Form::label('meeting_mode' ,__('general.mode') ,['class'=>'form-label']))   !!}
                {!!  Form::select('meeting_mode',\App\Enum\MeetingTypeEnum::getTranslationKeys(),null,['id'=>'meeting_type','class'=>'form-control ','required','placeholder'=>trans('general.select'),'onchange'=>'manage_meeting_type(this);']) !!}
            </div>
            <div class="col-md-4 mb-3 d-none" id="meeting_type_description_holder">
                {!!  Html::decode(Form::label('meeting_description' ,__('general.description') ,['class'=>'form-label']))   !!}
                {!!  Form::text('meeting_description',null,['id'=>'description','class'=>'form-control']) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!!  Html::decode(Form::label('meeting_held_date' ,__('general.held_date') ,['class'=>'form-label']))   !!}
                {!!  Form::text('meeting_held_date',null,['id'=>'meeting_held_date','class'=>'form-control datepicker']) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!!  Html::decode(Form::label('meeting_start_time' ,__('general.start_time') ,['class'=>'form-label']))   !!}
                {!!  Form::text('meeting_start_time',null,['id'=>'meeting_start_time','class'=>'form-control timepicker']) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!!  Html::decode(Form::label('meeting_end_time' ,__('general.end_time') ,['class'=>'form-label']))   !!}
                {!!  Form::text('meeting_end_time',null,['id'=>'meeting_end_time','class'=>'form-control timepicker']) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!!  Html::decode(Form::label('has_meeting_pass' ,__('general.meeting_pass') ,['class'=>'form-label']))   !!}
                {!!  Form::select('has_meeting_pass',\App\Services\GeneralService::yesOrNoForDropdown(),'no',['id'=>'has_meeting_pass','class'=>'form-control','onchange'=>'changeMeetingPass(this);']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        {!!  Html::decode(Form::label('images' ,__('general.images') ,['class'=>'form-label']))   !!}
        @include('components.images-field',['images'=>$for=='edit'?$model->images:[]])
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card" style="border: none !important;">
            <div class="card-header">
                <h6 class="mb-0">{{ trans('general.meeting_arranger_for') }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        {!!  Html::decode(Form::label('meeting_organized_for' ,__('general.client_id') ,['class'=>'form-label']))   !!}
                        <div class="input-group">
                            {!!  Form::number('meeting_organized_for',null,['id'=>'meeting_organized_for','class'=>'form-control']) !!}
                            <div class="input-group-append">
                                 <span class="input-group-text p-2 bg-info" id="basic-addon2">
                                    <i class="bx bx-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        {!!  Html::decode(Form::label('meeting_organized_for_name' ,__('general.name') ,['class'=>'form-label']))   !!}
                        {!!  Form::text('meeting_organized_for_name',null,['id'=>'meeting_organized_for_name','class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        {!!  Html::decode(Form::label('meeting_organized_for_contact' ,__('general.contact') ,['class'=>'form-label']))   !!}
                        {!!  Form::text('meeting_organized_for_contact',null,['id'=>'meeting_organized_for_contact','class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        {!!  Html::decode(Form::label('meeting_organized_for_email' ,__('general.email') ,['class'=>'form-label']))   !!}
                        {!!  Form::email('meeting_organized_for_email',null,['id'=>'meeting_organized_for_email','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card" style="border: none !important;">
            <div class="card-header">
                <h6 class="mb-0">{{ trans('general.available_locations') }}</h6>
            </div>
            <div class="card-body">
                @if(count(\App\Services\OfficeService::getAvailableOffices())>0)
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">{{ trans('general.location') }}</th>
                            <th scope="col">{{ trans('general.office_name') }}</th>
                            <th scope="col">{{ trans('general.sitting_capacity') }}</th>
                            <th class="text-center">{{ trans('general.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Services\OfficeService::getAvailableOffices() as $office)
                            <tr>
                                <td>
                                    @if($office->building  AND $office->floor)
                                        <strong>{{ $office->floor->name }}</strong> of
                                        <strong>{{ $office->building->name }}</strong>
                                    @elseif($office->building  AND !$office->floor)
                                        {{ $office->building->name }}
                                    @endif
                                </td>
                                <td>{{ $office->name }}</td>
                                <td>{{ $office->sitting_capacity }}</td>
                                <td class="text-center">
                                    <div class="form-check form-switch">
                                        {!! Form::radio('meeting_organized_location',$office->id,false,['class'=>'form-check-input align-self-center']) !!}
                                        <label class="form-check-label"></label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
