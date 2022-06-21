@extends('layouts.dashboard')
@section('css-before')
    @include('includes.datatable-css')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none pt-0">
                @include('components.General.form-list-header')
                <div class="card-body">
                    @if (is_null($salesRecord))
                        @include('dashboard.real-estate.flat.components.search.flat-details')
                    @else
                        @include('dashboard.real-estate.flat.components.search.sales-details')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('inner-script-files')
    <script src="{{ url('plugins/select2/js/select2.min.js') }}"></script>
    @include('includes.datatable-js')
@endsection
@section('innerScript')
    @include('includes.datatable-general-init', ['table' => 'datatable'])
@endsection
