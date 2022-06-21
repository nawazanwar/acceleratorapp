@extends('layouts.dashboard')
@section('css-before')
    <link href="{{ url('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ url('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
    <link href="{{ url('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    @include('includes.datatable-css')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['url' => route('dashboard.sales.store'), 'method' => 'POST','files' => true,'id' =>'sales_form']) !!}
                    <x-created-by-field />
                    <x-hidden-building-id />
                    @include('dashboard.real-estate.sales.fields')
                    <x-buttons :save="true" :saveNew="true" :cancel="true" :reset="true"
                               formID="sales_form" cancelRoute="dashboard.sales.index"/>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.real-estate.common.hr-picker-modal')
    @include('dashboard.real-estate.common.add-hr-modal')
    @include('dashboard.real-estate.common.add-installment-plan-modal')
@endsection
@include('dashboard.real-estate.sales.components.scripts')
