@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none pt-0">
                @include('dashboard.components.general.form-list-header')
                <div class="card-body">
                    {!! Form::model($model, ['url' =>route('dashboard.users.update', $model->id), 'method' => 'POST','files' => true,'id' =>'floorName', 'class' => 'solid-validation']) !!}
                    @method('PUT')
                    <x-updated-by-field></x-updated-by-field>
                    <x-edit-id :id="$model->id"></x-edit-id>
                    <div class="mb-3 row">
                        <div class="col-6">
                            {!!  Html::decode(Form::label('map_latitude' ,__('general.map_latitude') ,['class'=>'form-label']))   !!}
                            {!!  Form::text('map_latitude',null,['id'=>'map_latitude','class'=>'form-control ']) !!}
                        </div>
                        <div class="col-6">
                            {!!  Html::decode(Form::label('map_longitude' ,__('general.map_longitude') ,['class'=>'form-label']))   !!}
                            {!!  Form::text('map_longitude',null,['id'=>'map_longitude','class'=>'form-control ']) !!}
                    </div>
                        <div class="col-12">
                            {!!  Html::decode(Form::label('map_address' ,__('general.map_address') ,['class'=>'form-label']))   !!}
                            {!!  Form::textarea('map_address',null,['id'=>'map_address','class'=>'form-control ']) !!}
                          {{--  @error('map_address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror--}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-6">
                            {!!  Html::decode(Form::label('instagram' ,__('general.instagram') ,['class'=>'form-label']))   !!}
                            {!!  Form::text('instagram',null,['id'=>'instagram','class'=>'form-control ']) !!}
                        </div>
                        <div class="col-6">
                            {!!  Html::decode(Form::label('facebook' ,__('general.facebook') ,['class'=>'form-label']))   !!}
                            {!!  Form::text('facebook',null,['id'=>'facebook','class'=>'form-control ']) !!}
                        </div>
                        <div class="col-6">
                            {!!  Html::decode(Form::label('whatsapp' ,__('general.whatsapp') ,['class'=>'form-label']))   !!}
                            {!!  Form::text('whatsapp',null,['id'=>'whatsapp','class'=>'form-control ']) !!}
                        </div>
                        <div class="col-6">
                            {!!  Html::decode(Form::label('twitter' ,__('general.twitter') ,['class'=>'form-label']))   !!}
                            {!!  Form::text('twitter',null,['id'=>'twitter','class'=>'form-control ']) !!}
                        </div>
                        <div class="col-6">
                            {!!  Html::decode(Form::label('youtube' ,__('general.youtube') ,['class'=>'form-label']))   !!}
                            {!!  Form::text('youtube',null,['id'=>'youtube','class'=>'form-control ']) !!}
                        </div>
                        <div class="col-6">
                            {!!  Html::decode(Form::label('linkedIn' ,__('general.linkedIn') ,['class'=>'form-label']))   !!}
                            {!!  Form::text('linkedIn',null,['id'=>'linkedIn','class'=>'form-control ']) !!}
                        </div>
                        <div class="col-12">
                            {!!  Html::decode(Form::label('about_us' ,__('general.about_us') ,['class'=>'form-label']))   !!}
                            {!!  Form::textarea('about_us',null,['id'=>'about_us','class'=>'form-control ']) !!}
                        </div>
                    </div>
                    <x-buttons :update="true" :cancel="true" cancelRoute="dashboard.users.index"></x-buttons>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
