@extends('layouts.dashboard')
@section('css-before')
    <link href="{{ url('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-shadow pt-0">
                @include('components.General.form-list-header')
                <div class="card-body" style="padding-top: 0;">
                    {!! Form::open(['url' => route('dashboard.colony.store'), 'method' => 'POST','files' => true,'id' =>'colony_form', 'class' => 'solid-validation']) !!}
                        <x-created-by-field />
                        @include('dashboard.real-estate.definition.colony.fields')
                        <x-buttons :save="true" :saveNew="true" :cancel="true" :reset="true"
                                   formID="colony_form" cancelRoute="dashboard.colony.index"/>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('innerScript')
    <script src="{{ url('plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@endsection
